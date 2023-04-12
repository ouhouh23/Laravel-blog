<?php

namespace App\Services;

use App\Models\Post;

class UserActivity
{
    public static function countView(Post $post) {
        $post->views += 1;
        $post->save();
    }
}
