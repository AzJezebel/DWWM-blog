<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    function create() {
        return view('auth.register');
    }

    function store(Request $request) {
        $validate = $request->validate([
            'firstname' => ['required', 'string', 'max:50'],
            'lastname'  => ['required', 'string', 'max:50'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required', 'confirmed', 'min:8'],
        ]);

        auth()->login($user);

        return redirect()->route('articles.index');
    }
}
