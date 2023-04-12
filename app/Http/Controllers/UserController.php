<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
//public $user;
//function __construct() {
//    $this->user = User::find(auth() -> id());
//}

    public function edit() {
        return view('user.edit', [
            'user' => User::find(auth() -> id())
        ]);
    }

    public function update()
    {
        $user = User::find(auth() -> id());

        $attributes = request()->validate([
            'username' => 'required',
            'avatar' => 'image'
        ]);

        if (isset($attributes['avatar'])) {
            $attributes['avatar'] = request()->file('avatar')->store('thumbnails');
        }

        $user->update($attributes);

        return redirect('/')->with('success', 'Profile updated!');
    }
}
