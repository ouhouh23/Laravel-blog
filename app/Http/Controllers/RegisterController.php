<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:2|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'password' => 'required|min:10|max:255',
            'email' => ['required', 'min:3', 'max:255', Rule::unique('users', 'email')],  // alternate
        ]);

        $user = User::create($attributes);
        auth()->login($user);

        session()->flash('success', 'Your account has been created');

        return redirect('/');
    }
}
