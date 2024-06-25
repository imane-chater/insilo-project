<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Cashier;

class PackController extends Controller
{
    public function index() {
        try {
            $packs = DB::table('packs')->orderBy('created_at', 'desc')->get();
            return view('admin.packs.index', ['packs' => $packs]);
        } catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function add(Request $request) {
        if($request->isMethod('post')) {
            $packData = $request->validate([
                'title' => ['string', 'required'],
                'price' => ['numeric', 'min:0', 'required'],
                'description' => ['string', 'required'],
                'max_gamers' => ['numeric', 'min:0', 'required']
            ]);
            try {
                $price = Cashier::stripe()->prices->create([
                    'currency' => 'eur',
                    'unit_amount' => $packData['price'] * 100,
                    'product_data' => ['name' => $packData['title']],
                ]);
                DB::table('packs')->insert(array_merge($packData, [
                    'stripe_price_id' => $price->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]));
                session()->flash('success', 'Pack ajouté avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }

            return back();
        }
        return view('admin.packs.add');
    }

    public function update(Request $request, $id) {
        $pack = DB::table('packs')->find($id);
        if($request->isMethod('post')) {
            $packData = $request->validate([
                'title' => ['string', 'required'],
                'price' => ['numeric', 'min:0', 'required'],
                'description' => ['string', 'required'],
                'max_gamers' => ['numeric', 'min:0', 'required']
            ]);
            try {

                $price = Cashier::stripe()->prices->create([
                    'currency' => 'eur',
                    'unit_amount' => $packData['price'] * 100,
                    'product_data' => ['name' => $packData['title']]
                ]);
                
                DB::table('packs')->where('id', $id)->update(array_merge($packData, [
                    'stripe_price_id' => $price->id,
                    'updated_at' => Carbon::now()
                ]));
                session()->flash('success', 'Pack modifié avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }
            return back();
        }
        return view('admin.packs.update', ["pack" => $pack]);
    }

    public function delete($id) {
        try  {
            DB::table('packs')->where('id', $id)->delete();
            session()->flash('success', 'Pack supprimé avec succès');
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    
        return back();
    }
}