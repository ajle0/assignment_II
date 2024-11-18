<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactController;
   
Route::get('/', function () {
    return view('welcome');
});
// Posts endpoint
Route::get('/posts', [PostsController::class, 'index']);

// Route to show the contact form
Route::get('/contact', function () {
    return view('contact');
})->name('contact.form');

// Route to handle form submission
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');