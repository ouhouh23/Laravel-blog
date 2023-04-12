<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    //public $user;
//function __construct() {
//    $this->user = User::find(auth() -> id());
//}

    public function create(Post $post) {
        $user = User::find(auth() -> id());
        $user->featuredPosts()->attach($post->id);

        return back()->with('success', 'Post added to your bookmarks');
    }

    public function delete(Post $post) {
        $user = User::find(auth() -> id());
        $user->featuredPosts()->detach($post->id);

        return back()->with('success', 'Post removed from your bookmarks');
    }

    public function show() {
        $user = User::find(auth()->id());

        if ($user->featuredPosts->count() > 0) {
            $posts = $user->featuredPosts()->paginate(6)->withQueryString();
        }
        else {
            $posts = null;
        }

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
