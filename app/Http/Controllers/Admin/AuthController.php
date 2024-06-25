<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        if($request->isMethod('post')) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
              ]);
        
              if(Auth::attempt($credentials)) {
                $request->session()->regenerate();
                if(Auth::user()->role == "admin") {
                    return redirect()->intended('admin/dashboard');
                } else {
                    return back()->withErrors([
                        'email' => 'Unauthorized user.',
                    ])->onlyInput('email');
                }
              }
        
              return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
        }
        return view('admin.auth.login');
    }

    public function profile(Request $request) {
        if($request->isMethod('post')) {
            $userData = $request->validate([
                'first_name' => ['string', 'required'],
                'last_name' => ['string', 'required'],
                'email' => ['email', 'required'],
            ]);
            try {
                $image =  Auth::user()->image;
                if($request->hasFile('image')) {
                    $image = $request->file('image')->store("users");
                }
                $password = Auth::user()->password;
                if($request->filled('password')) {
                    $password = Hash::make($request->password);
                }
                DB::table('users')->where('id', Auth::user()->id)->update([
                    'first_name'=> $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email'],
                    'password' => $password,
                    'image' => $image,
                    'updated_at' => Carbon::now()
                ]);
                session()->flash('success', "Profil mis à jour avec succès");
            } catch(Exception $e) {
                session()->flash('error', $e->getMessage());
            }
            return back();
        }
        return view('admin.auth.profile');
    }

    public function forgotPassword(Request $request) {
        
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect("/admin/login");
    }
}