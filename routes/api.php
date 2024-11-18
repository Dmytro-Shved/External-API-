<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// posts
Route::resource('/posts', PostController::class);
