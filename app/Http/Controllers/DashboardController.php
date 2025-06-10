<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View {
        //Get logged user
        $user = Auth::user();

        return View('pages.dashboard', compact('user'));
    }
}
