<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::findAll()
    ]);
});

// Route::get('posts/{post}', function ($slug) {
//     return view('post', [
//         'post' => Post::find($slug)
//     ]);
// })->where('post', '[A-z_/-]+');



Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (! file_exists($path)) {
        abort(404);
    }

    $post = cache()->remember("posts.{$slug}", 5, fn() => 
        file_get_contents($path)
    );

    return view('post', [
        'post' => file_get_contents($path)
    ]);
})->where('post', '[A-z_/-]+');
