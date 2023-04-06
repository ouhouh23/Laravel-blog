<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
        if ($post->status == 'published') {
            $this->countView($post);

            return view('posts.show', [
                'post' => $post,
            ]);
        }
        else {
            abort(403);
        }
    }

    public function countView(Post $post) {
        $post->views += 1;
        $post->save();
    }
}
