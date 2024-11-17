<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
   
Route::get('/', function () {
    return view('welcome');
});
// Posts endpoint
Route::get('/posts', [PostsController::class, 'index']);