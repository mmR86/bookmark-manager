<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(): View {
        return view('auth/register');
    }
}
