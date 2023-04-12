<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;

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
        $attributes['status'] = Status::DRAFT->value;

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
            'status' => [new Enum(Status::class)],
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect('admin/posts')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}
