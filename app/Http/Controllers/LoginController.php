<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    // LOGIN
    public function login(): View {
        return view('auth/login');
    }

    // LOGOUT
    public function logout(Request $request): RedirectResponse {
        return redirect('/');
    }
    
}
