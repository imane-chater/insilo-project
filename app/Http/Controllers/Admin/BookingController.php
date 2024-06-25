<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::all()->sortBy('created_at');
        return view('admin.bookings.index', ['bookings' => $bookings]);
    }

    public function add(Request $request) {
        $packs = DB::table('packs')->orderBy('created_at','desc')->get();
        if($request->isMethod('post')) {
            $bookingData = $request->validate([
                'price' => ['numeric', 'required'],
                'first_name' => ['string', 'required'],
                'last_name' => ['string', 'required'],
                'email' => ['required', 'email'],
                'number_of_gamers' => ['numeric', 'required'],
                'booking_date' => ['date'],
                'pack_id' => ['required', 'exists:packs,id']
            ]);
            try {
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
                DB::table('bookings')->insert(array_merge($bookingData, [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]));
                session()->flash('success', 'Réservation ajoutée avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }

            return back();
        }
        return view('admin.bookings.add', ['packs' => $packs]);
    }

    public function update(Request $request, $id) {
        $packs = DB::table('packs')->orderBy('created_at','desc')->get();
        if($request->isMethod('post')) {
            $bookingData = $request->validate([
                'price' => ['numeric', 'required'],
                'first_name' => ['string', 'required'],
                'last_name' => ['string', 'required'],
                'email' => ['required', 'email'],
                'number_of_gamers' => ['numeric', 'required'],
                'booking_date' => ['date'],
                'pack_id' => ['required', 'exists:packs,id']
            ]);
            try {
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
                DB::table('bookings')
                    ->where('id', $id)
                    ->update(array_merge($bookingData, [
                        'updated_at' => Carbon::now()
                    ]));
                session()->flash('success', 'Réservation modifiée avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }
            return back();
        }
        
        $booking = DB::table('bookings')->find($id);
        return view('admin.bookings.update', ['booking' => $booking, 'packs' => $packs]);
    }

    public function delete($id) {
        try {
            DB::table('bookings')->where('id', $id)->delete();
            session()->flash('success', 'Réservation supprimée avec succès');
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        return back();
    }
}