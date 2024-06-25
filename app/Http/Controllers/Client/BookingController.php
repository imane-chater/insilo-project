<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Client;
use Carbon\Carbon;
use DateTime;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index() {
        $packs = DB::table('packs')->orderBy('created_at', 'asc')->get();
        return view('client.booking', ['packs' => $packs]);
    }

    public function book(Request $request) {
        if($request->isMethod('post')) {
            $bookingData = $request->validate([
                'first_name' => ['string', 'required'],
                'last_name' => ['string', 'required'],
                'email' => ['required', 'email'],
                'number_of_gamers' => ['numeric', 'required'],
                'booking_date' => ['date'],
                'pack_id' => ['required', 'exists:packs,id']
            ]);
            try {
                $packId = $bookingData['pack_id'];

                $pack = DB::table('packs')->find($packId);

                if($bookingData['number_of_gamers'] > $pack->max_gamers) {
                    return back()->withErrors([
                        'number_of_gamers' => "Le nombre maximum de joueurs pour ce pack est " . $pack->max_gamers
                    ]);
                }   
                $bookingDate = new DateTime($bookingData['booking_date']);
                $year = $bookingDate->format("Y");
                $month = $bookingDate->format("m");
                $day = $bookingDate->format("d");
                $time = $bookingDate->format("h:i:s");
                $bookings = DB::table('bookings')
                    ->whereYear('booking_date', $year)
                    ->whereMonth('booking_date', $month)
                    ->whereDay('booking_date', $day)
                    ->whereTime('booking_date', $time)
                    ->get();
                if(!$bookings->isEmpty()) {
                    return back()->withErrors(['booking_date' => "Créneau déjà pris !! Veuillez changer de créneau."]);
                }

                $client = DB::table('clients')->where('email', $bookingData['email']);
                $clientId = "";

                if(!$client->exists()) {
                    $clientId = DB::table('clients')->insertGetId([
                        'first_name' => $bookingData['first_name'],
                        'last_name' => $bookingData['last_name'],
                        'email' => $bookingData['email'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                } else {
                    $clientId = $client->first()->id;
                }
                    
                $client = Client::find($clientId);

                $bookingId = DB::table('bookings')->insertGetId([
                    'pack_id' => $bookingData['pack_id'],
                    'price' => $pack->price,
                    'number_of_gamers' => $bookingData['number_of_gamers'],
                    'booking_date' => $bookingData['booking_date'],
                    'client_id' => $clientId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                return $client->checkout([$pack->stripe_price_id => 1], [
                    'success_url' => route('checkout-success', ['bookingId' => $bookingId]),
                    'cancel_url' => route('checkout-cancel', ["bookingId" => $bookingId]),
                ]);
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }
            return back();

        }
    }

    public function paymentSuccessful(Request $request, $bookingId) {
        DB::table('bookings')->where('id', $bookingId)
        ->update([
            'status' => 'confirmed',
            'updated_at' => Carbon::now()
        ]);
        
        return view('client.checkout-success', ['bookingId' => $bookingId]);
    }

    public function paymentCancelled(Request $request, $bookingId) {
        DB::table('bookings')->where('id', $bookingId)
        ->update([
            'status' => 'failed',
            'updated_at' => Carbon::now(),
            'deleted_at' => Carbon::now()
        ]);
        
        return view('client.checkout-failed');
    }

    public function downloadInvoice(Request $request, $bookingId) {
        $booking = Booking::find($bookingId);
        $client = DB::table('clients')->find($booking->client_id);
        if($booking->status == "confirmed") {
            $dompdf = new Dompdf();
            $html = view('client.invoices.booking', ['booking' => $booking, 'client' => $client])->render();

            $dompdf->loadHtml($html);

            $dompdf->setPaper("A4", 'portrait');

            $dompdf->render();

            DB::table('bookings')->where('id', $bookingId)
            ->update([
                'status' => 'invoice_downloaded',
                'updated_at' => Carbon::now(),
            ]);

            $dompdf->stream("invoice_$bookingId.pdf", ['Attachment' => false]);
            return;
        } else {
            session()->flash('error', 'Réservation invalide ou Facture expirée');
            return back();
        }
    }
}