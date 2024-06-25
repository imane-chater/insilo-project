<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function index() {
        $medias = DB::table('medias')->orderBy('created_at', 'desc')->get();
        return view('admin.medias.index', ['medias' => $medias]);
    }

    public function add(Request $request) {
        if($request->isMethod('post')) {
            $mediaData = $request->validate([
                'title' => ['string', 'required'],
                'type' => ['string', 'required'],
            ]);
            try {
                $path = '';
                if($request->hasFile('image_path')) {
                    $path = $request->file('image_path')->store('medias');
                } else if($request->has('video_path')) {
                    $pathArray = explode("?v=", $request['video_path']);
                    $videoId = $pathArray[1];
                    $path = "https://www.youtube.com/embed/" . $videoId;
                }
            
                DB::table('medias')->insert([
                    "title" => $mediaData["title"],
                    "type" => $mediaData['type'],
                    "path" => $path,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
                session()->flash('success', 'Media ajouté avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }

            return back();
        }
        return view('admin.medias.add');
    }

    public function update(Request $request, $id) {
        $media = DB::table('medias')->find($id);
        if($request->isMethod('post')) {
            $mediaData = $request->validate([
                'title' => ['string', 'required'],
                'type' => ['string', 'required'],
            ]);
            try {
                $path = $media->path;
                if($request->hasFile('image_path')) {
                    $path = $request->file('image_path')->store('medias');
                } else if($request->has('video_path')) {
                    $pathArray = explode("?v=", $request['video_path']);
                    $videoId = $pathArray[1];
                    $path = "https://www.youtube.com/embed/" . $videoId;
                }
    
                
                DB::table('medias')->where("id", $id)->update([
                    "title" => $mediaData["title"],
                    "type" => $mediaData['type'],
                    "path" => $path,
                    "updated_at" => Carbon::now()
                ]);
                session()->flash('success', 'Media modifié avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }

            return back();
        }

        return view('admin.medias.update', ["media" => $media]);
    }

    public function delete($id) {
        try {
            DB::table('medias')->where('id', $id)->delete();
            session()->flash('success', 'Media supprimé avec succès');
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        return back();
    }
}