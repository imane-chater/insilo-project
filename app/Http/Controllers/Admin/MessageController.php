<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index() {
        $messages = DB::table('messages')->orderBy('created_at', 'desc')->get();
        return view('admin.messages.index', ['messages' => $messages]);
    }

    public function update(Request $request, $id) {
        if($request->isMethod('post')) {
            $messageData = $request->validate([
                'sender' => ['numeric', 'required'],
                'sender_email' => ['email', 'required'],
                'subject' => ['string', 'required'],
                'content' => ['required', 'email'],
            ]);
            try {
                DB::table('messages')->where('id', $id)->update(array_merge($messageData, ['updated_at' => Carbon::now()]));
                session()->flash('success', 'Message modifié avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }
   
            return back();
        }
        $message = DB::table('messages')->find($id);
        return view('admin.messages.update', ["message",$message]);
    }

    public function delete($id) {
        try {
            DB::table('messages')->where('id', $id)->delete();
            session()->flash('success', 'Message supprimé avec succès');
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        return back();
    }
}