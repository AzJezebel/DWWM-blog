<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    function create() {
        return view('auth.register');
    }

    function store(Request $request) {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:50'],
            'lastname'  => ['required', 'string', 'max:50'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required', 'confirmed', 'min:8'],
        ]);
        
        // Create the user
        $user = User::create([
            'firstname' => $validated['firstname'],
            'lastname'  => $validated['lastname'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('articles.index')->with('success', 'Bienvenue ' . $user->firstname . ' ! Votre compte a été créé avec succès.');
    }
}
