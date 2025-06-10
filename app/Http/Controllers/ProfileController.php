<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Update the Profile of the current user
    public function update(Request $request): RedirectResponse {
        
        //Get the currently logged user
        $user = Auth::user();

        //Validate the data
        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        //Get user name
        $user->name = $request->input('name');

        //Avatar upload
        if($request->hasFile('avatar')) {
            //Delete old image if it exist
            if($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            //Store new avatar image
            $avatarPath = $request->file('avatar')->store('imgs', 'public');
            $user->avatar = $avatarPath;
        }

        //Update user info
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile updated!');
    }
}
