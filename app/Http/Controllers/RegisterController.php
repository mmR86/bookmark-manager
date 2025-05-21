<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegisterController extends Controller
{
    public function register(): View {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse {
        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Create User
        $user = User::create($validatedData);

        return redirect()->route('login')->with('success', 'You are registered and can log in!');
    }
}
