<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

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
        if ($post->status !== 'published') {
            abort(403);
        }

        $this->countView($post);

        return view('posts.show', [
                'post' => $post,
                'user' => User::find(auth()->id())
            ]);
    }

    public function countView(Post $post) {
        $post->views += 1;
        $post->save();
        //вынести в сервис
    }
}
