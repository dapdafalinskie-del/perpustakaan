<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if(!Auth::attempt($validated)){
            return back()->with('error', 'Email atau password salah.');
        }

        $request->session()->regenerate();
        
        return redirect()->route('dashboard')
            ->with('success', 'Login berhasil!');
    }

    public function logout(){
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login.page')
            ->with('success', 'Logout berhasil!');
    }
}
