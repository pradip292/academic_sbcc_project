<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {

        return view('auth.login');

    }
    public function doLogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);

    }
    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->intended('home');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'An error occurred while processing your request');
        }
    }
    public function home()
    {

        return view('auth.home');

    }

}