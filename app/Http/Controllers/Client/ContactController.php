<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index() {
        return view('client.contact');
    }

    public function sendMessage(Request $request) {
    
        $formData = $request->validate([
            'sender' => ['string', 'required'],
            'email' => ['email', 'required'],
            'subject' => ['string'],
            'message' => ['string', 'required']
        ]);

        try {
            DB::table('messages')->insert([
                'sender' => $formData['sender'],
                'sender_email' => $formData['email'],
                'subject' => $formData['subject'],
                'content' => $formData['message'],
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ]);
    
            session()->flash('success', "Message envoyé avec succès");
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    
        return back();
    }
}