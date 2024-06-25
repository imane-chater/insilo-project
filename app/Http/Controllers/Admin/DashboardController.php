<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $bookings = Booking::limit(5)->orderBy('created_at')->get();
        $messages = DB::table('messages')->limit(5)->orderBy('created_at', 'desc')->get();
        $reviews = DB::table('reviews')->limit(5)->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        $games = DB::table('games')->get();

        return view('admin.dashboard.index', [
            'notifications' => $notifications, 
            'bookings' => $bookings, 
            'messages' => $messages, 
            'reviews' => $reviews,
            'games' => $games
        ]);
    }
}