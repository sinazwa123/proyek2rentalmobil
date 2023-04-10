<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.index');
    }


    public function authenticate(Request $request){
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            if (auth()->user()->role == 'Admin') {
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/home');
            }
        }
        return back()->with('loginError', 'Email atau password yang dimasukkan salah!');
    }

    public function logout(Request $request){
    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/login');
    }
}
