<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Post;
use App\Models\User;
use App\Services\UserActivity;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::filtered()->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        if (Status::DRAFT->value == $post->status) {
            abort(403);
        }

        UserActivity::countView($post);

        return view('posts.show', [
                'post' => $post,
                'user' => User::find(auth()->id())
            ]);
    }
}
