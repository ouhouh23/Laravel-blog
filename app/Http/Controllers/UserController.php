<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Post $post) {
            $user = User::find(auth() -> id());
//            $favorites_id = $user->favorite_posts_id;
//            $favorites_id[] = $post->id;
//            $user->favorite_posts_id = $favorites_id;
//        ddd($user->favorite_posts_id);
             $user->favorite_posts_id->prepend($post->id);
            $user->save();

            return back()->with('success', 'Post added to your bookmarks');
    }

    public function delete(Post $post) {
            $user = User::find(auth() -> id());

            $favorites_id = $user->favorite_posts_id;

            $removingId =  array_search($post->id, $favorites_id);
            unset($favorites_id[$removingId]);

            $user->favorite_posts_id = $favorites_id;
            $user->save();

            return back()->with('success', 'Post removed from your bookmarks');
    }

    public function show() {
        $user = User::find(auth() -> id());

        if ($user->favorite_posts()) {
            $posts = $user->favorite_posts()->paginate(6)->withQueryString();
        }
        else {
            $posts = null;
        }

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

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
