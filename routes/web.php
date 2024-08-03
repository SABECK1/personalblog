<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TabsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;

// Route::get('/', function () {
//     return view('index');
// })->name('home');

Route::get('/', [PagesController::class, 'main'])->name('home');
Route::get('posts', [PagesController::class, 'posts'])->name('posts');
Route::get('about', [PagesController::class, 'about'])->name('about');
Route::get('contact', [PagesController::class, 'contact'])->name('contact');
Route::post('contact.mail', [PagesController::class, 'contact_mail_auth'])->name('contact.mail');
Route::post('contact.mail_guest', [PagesController::class, 'contact_mail_guest'])->name('contact.mail_guest');

 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('dashboard/account', [TabsController::class, 'account'])->name('/dashboard/account')->middleware(['auth', 'verified']);
Route::get('dashboard/profile', [TabsController::class, 'profile'])->name('/dashboard/profile')->middleware(['auth', 'verified']);
Route::get('dashboard/content', [TabsController::class, 'content'])->name('/dashboard/content')->middleware(['auth', 'verified']);
Route::get('dashboard/index', [TabsController::class, 'index'])->name('/dashboard/index')->middleware(['auth', 'verified']);
Route::get('dashboard/admin', [TabsController::class, 'admin'])->name('/dashboard/admin')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
//    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('post', PostController::class);
Route::resource('comment', CommentController::class);
//Comment Section guarded by auth
Route::middleware('auth')->resource('posts.comments', CommentController::class);





require __DIR__ . '/auth.php';
