<?php

use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\NewsletterContoller;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class, 'index']);

Route::get('posts/{post}', [PostsController::class, 'show']);
Route::get('admin/posts/create', [AdminPostsController::class, 'create'])->middleware('can:admin');
Route::post('admin/posts', [AdminPostsController::class, 'store'])->middleware('can:admin');
Route::get('admin/posts', [AdminPostsController::class, 'index'])->middleware('can:admin');
Route::get('admin/posts/{post}/edit', [AdminPostsController::class, 'edit'])->middleware('can:admin');
Route::patch('admin/posts/{post}', [AdminPostsController::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}', [AdminPostsController::class, 'destroy'])->middleware('can:admin');

Route::post('posts/{post}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');

Route::post('newsletter', NewsletterContoller::class);

Route::get('posts/{post}/AddBookmark', [UserController::class, 'create'])->middleware('auth');
Route::get('posts/{post}/RemoveBookmark', [UserController::class, 'delete'])->middleware('auth');
Route::get('bookmarks', [UserController::class, 'show'])->middleware('auth');
Route::get('account', [UserController::class, 'edit'])->middleware('auth');
Route::patch('account/update', [UserController::class, 'update'])->middleware('auth');

Route::feeds();
