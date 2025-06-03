<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // LOGIN
    public function login(): View {
        return view('auth/login');
    }

    // AUTH
    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string'
        ]);

        // Atempt to authenticate user, always validate input before making an attempt
        if(Auth::attempt($credentials)) {
            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))->with('success', 'You are logged in');
        }

        //If auth fails redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ])->onlyInput('email');
    }

    // LOGOUT
    public function logout(Request $request): RedirectResponse {
        Auth::logout();

        //Invalidate the session
        $request->session()->invalidate();
        //Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
