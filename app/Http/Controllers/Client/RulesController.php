<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RulesController extends Controller
{
    public function index() {
        $games = DB::table('games')->orderBy('created_at', 'desc')->get();
        return view('client.rules', ['games' => $games]);
    }
}