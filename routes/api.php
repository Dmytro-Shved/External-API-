<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// posts
Route::resource('/posts', PostController::class);
Route::get('/posts/{post}/comments', [PostController::class, 'post_comments']);

// comments
Route::resource('/comments', CommentsController::class);
Route::get('/comments/post/{postId}', [CommentsController::class, 'comments_post']);
