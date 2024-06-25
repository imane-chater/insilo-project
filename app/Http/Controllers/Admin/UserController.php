<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = DB::table('users')->orderBy('created_at', 'desc')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function add(Request $request) {
        if($request->isMethod('post')) {
            $userData = $request->validate([
                'first_name' => ['string', 'required'],
                'last_name' => ['string', 'required'],
                'email' => ['email', 'required'],
                'password' => ['string', 'required'],
                'image' => ['file', 'required'],
                'role' => ['in:admin,user']
            ]);
            try {
                $image = $request->file('image')->store("users");
                DB::table('users')->insert([
                    'first_name'=> $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email'],
                    'password' => Hash::make($userData['password']),
                    'image' => $image,
                    'role' => $userData['role'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                session()->flash('success', 'Utilisateur ajouté avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }


            return back();
        }
        return view('admin.users.add');
    }

    public function update(Request $request, $id) {
        $user = DB::table('users')->find($id);
        if($request->isMethod('post')) {
            $userData = $request->validate([
                'first_name' => ['string', 'required'],
                'last_name' => ['string', 'required'],
                'email' => ['email', 'required'],
                'role' => ['in:admin,user']
            ]);
            try {
                $image = $user->image;
                if($request->hasFile('image')) {
                    $image = $request->file('image')->store("users");
                }
                $password = $user->password;
                if($request->filled('password')) {
                    $password = Hash::make($request->password);
                }
                DB::table('users')->where('id', $id)->update([
                    'first_name'=> $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email'],
                    'password' => $password,
                    'image' => $image,
                    'role' => $userData['role'],
                    'updated_at' => Carbon::now()
                ]);
                session()->flash('success', 'Utilisateur ajouté avec succès');
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }

            return back();
        }
        return view('admin.users.update', ['user' => $user]);
    }

    public function delete($id) {
        try {
            DB::table('users')->where('id', $id)->delete();
            session()->flash('success', 'Utilisateur supprimé avec succès');
        } catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        return back();
    }
}