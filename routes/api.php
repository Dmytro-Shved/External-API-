<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// posts
Route::apiResource('/posts', PostController::class);
Route::get('/posts/{post}/comments', [PostController::class, 'post_comments']);

// comments
Route::apiResource('/comments', CommentController::class);
Route::get('/comments/post/{postId}', [CommentController::class, 'comments_post']);

// albums
Route::apiResource('/albums', AlbumController::class);

//photos
Route::apiResource('/photos', PhotoController::class);

//todos
Route::apiResource('/todos', TodoController::class);

//users
Route::apiResource('/users', UserController::class);
