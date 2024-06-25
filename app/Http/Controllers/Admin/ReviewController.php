<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index() {
        $reviews = DB::table('reviews')->orderBy('created_at', 'desc')->get();
        return view('admin.reviews.index', ['reviews' => $reviews]);
    }

    public function add(Request $request) {
        if($request->isMethod('post')) {
            $reviewData = $request->validate([
                'name' => ['string', 'required'],
                'rating' => ['numeric', 'required'],
                'email' => ['email', 'required'],
                'comment' => ['string', 'required']
            ]); 
            try {
                DB::table('reviews')->insert(array_merge($reviewData, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]));
                session()->flash('success', 'Avis ajouté avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }          
            return back();
        }
        return view('admin.reviews.add');
    }

    public function update(Request $request, $id) {
        if($request->isMethod('post')) {
            $reviewData = $request->validate([
                'name' => ['string', 'required'],
                'rating' => ['numeric', 'required'],
                'email' => ['email', 'required'],
                'comment' => ['string', 'required']
            ]);
            try {
                DB::table('reviews')->where('id', $id)->update(array_merge($reviewData, ['updated_at' => Carbon::now()]));
                session()->flash('success', 'Avis modifié avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }    
            return back();
        }
        $review = DB::table('reviews')->find($id);
        return view('admin.reviews.update', ["review" => $review]);
    }

    public function delete($id) {
        try {
            DB::table('reviews')->where('id', $id)->delete();
            session()->flash('success', 'Avis supprimé avec succès');
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        return back();
    }
}