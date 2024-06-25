<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index() {
        $games = DB::table('games')->orderBy('created_at', 'desc')->get();
        return view('admin.games.index', ['games' => $games]);
    }

    public function add(Request $request) {
        if($request->isMethod('post')) {
            $gameData = $request->validate([
                'name' => ['string', 'required'],
                'description' => ['string', 'required'],
                'image' => ['file', 'required'],
            ]);
            try {
                $filePath = $request->file('image')->store('games');

                DB::table('games')->insert([
                    "name" => $gameData["name"],
                    "description" => $gameData['description'],
                    "image" => $filePath,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
                session()->flash("success", "Jeux ajouté avec succès!");
            } catch(Exception $e) {
                session()->flash("error", $e->getMessage());
            }

            return back();
        }
        return view('admin.games.add');
    }

    public function update(Request $request, $id) {
        $game = DB::table('games')->find($id);
        if($request->isMethod('post')) {
            $gameData = $request->validate([
                'name' => ['string'],
                'description' => ['string'],
                'image' => ['file'],
            ]);
            try {
                $filePath = $game->image;
                if($request->hasFile("image")) {
                    $filePath = $request->file('image')->store('games/');
                }

                DB::table('games')->where('id', $id)->update([
                    "name" => $gameData["name"],
                    "description" => $gameData['description'],
                    "image" => $filePath,
                    "updated_at" => Carbon::now()
                ]);
                session()->flash("success", "Jeux modifié avec succès!");
            } catch(Exception $e) {
                session()->flash("error", $e->getMessage());
            }
            return back();
        }
        return view('admin.games.update', ['game' => $game]);
    }

    public function delete($id) {
        try {
            DB::table('games')->where('id', $id)->delete();
            session()->flash('success', 'Jeux supprimé avec succès');
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        return back();
    }
}