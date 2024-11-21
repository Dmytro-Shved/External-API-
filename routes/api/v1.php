<?php

use App\Http\Controllers\Api\v1\AlbumController;
use App\Http\Controllers\Api\v1\CommentController;
use App\Http\Controllers\Api\v1\PhotoController;
use App\Http\Controllers\Api\v1\PostController;
use App\Http\Controllers\Api\v1\TodoController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

// posts
Route::apiResource('/posts', PostController::class);
Route::get('/posts/{post}/comments', [PostController::class, 'post_comments']);
Route::get('/posts/quantity/{quantity}', [PostController::class, 'posts_quantity']);
Route::get('/posts/keyword/{keyword}', [PostController::class, 'posts_keyword']);

// comments
Route::apiResource('/comments', CommentController::class);
Route::get('/comments/post/{postId}', [CommentController::class, 'comments_post']);

// albums
Route::apiResource('/albums', AlbumController::class);

// photos
Route::apiResource('/photos', PhotoController::class);

// todos
Route::apiResource('/todos', TodoController::class);

// users
Route::apiResource('/users', UserController::class);
