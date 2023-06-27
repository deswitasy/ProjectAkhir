<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login Admin',
        ];
        return view('login', $data);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/')->with('logout', 'Terimakasih! sesi Anda telah berakhir.');
    }
}
