<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
//        $posts = Post::latest();
//
//        if(request('search')) {
//            $posts
//                ->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('title', 'like', '%' . request('search') . '%');
//        }

        return view('posts', [
            //            'posts' => $posts->get(),
            'posts' => Post::latest()->filter()->get(),
            'categories' => Category::all(),
            'currentCategory' => '',
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }
}
