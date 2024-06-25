<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index() {
        $medias = DB::table('medias')->orderBy('created_at', 'desc')->get();
        return view('client.gallery', ['medias' => $medias]);
    }
}