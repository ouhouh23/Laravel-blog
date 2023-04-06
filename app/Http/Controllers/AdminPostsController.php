<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class AdminPostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'piece' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['status'] = 'unpublished';
        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        Post::create($attributes);

        return redirect('/')->with('success', 'Post created!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'piece' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $attributes['status'] = request('status');

        $user = User::where('username', request('author'))->first();

        if(!isset($user)) {
            $user = User::factory()->create(['username' => request('author')]);
        }
        $attributes['user_id'] = $user->id;


        $post->update($attributes);

        return redirect('admin/posts')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}
