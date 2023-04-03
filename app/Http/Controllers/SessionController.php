<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'Logged out');
    }

    public function create() {
        return view('sessions.create');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            // session fixation
            session()->regenerate();
            return redirect('/')->with('success', 'Logged in');
        }

        throw ValidationException::withMessages([
            'email' => 'Wrong email or password'
        ]);
    }
}