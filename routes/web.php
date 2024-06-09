<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;

// Route::get('/', function () {
//     return view('index');
// })->name('home');

Route::get('/', [PagesController::class, 'main'])->name('home');
Route::get('articles', [PagesController::class, 'articles'])->name('articles');
Route::get('about', [PagesController::class, 'about'])->name('about');
Route::get('contact', [PagesController::class, 'contact'])->name('contact');
Route::post('contact', [PagesController::class, 'contact_mail'])->name('contact.mail');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('post', PostController::class);
Route::resource('posts.comments', CommentController::class);

require __DIR__ . '/auth.php';
