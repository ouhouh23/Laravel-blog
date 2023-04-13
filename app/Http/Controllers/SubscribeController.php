<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function create(Post $post) {
        $user = User::find(auth() -> id());
        $user->subscriptions()->attach($post->author->id);

        return back()->with('success', 'Subscribed!');
    }

    public function delete(Post $post) {
        $user = User::find(auth() -> id());
        $user->subscriptions()->detach($post->author->id);

        return back()->with('success', 'Unsubscribed');
    }
}
