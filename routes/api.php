<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// posts
Route::resource('/posts', PostController::class);
Route::get('/posts/{post}/comments', [PostController::class, 'post_comments']);

// comments
Route::resource('/comments', CommentController::class);
Route::get('/comments/post/{postId}', [CommentController::class, 'comments_post']);
