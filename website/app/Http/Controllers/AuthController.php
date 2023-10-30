<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(LoginRequest $request)
    {
        // Retrieve the fields validated by the rules
        $credentials = $request->validated();

        // Tries to login the user with the credentials if it works we redirect
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('users.show'));
        }

        return to_route('auth.login')->withErrors([
            'name' => "Identifiants incorrect"
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return to_route('home.landing');
    }
}
