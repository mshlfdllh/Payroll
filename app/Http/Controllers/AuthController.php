<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // cek login
        if (Auth::attempt($credentials)) {

            // buat session login
            $request->session()->regenerate();

            // redirect berdasarkan role
            if (Auth::user()->role == 'admin') {

                return redirect('/admin');

            } elseif (Auth::user()->role == 'user') {

                return redirect('/attendance');
            }
        }

        // gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}