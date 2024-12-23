<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
// Route utama untuk CRUD blog
Route::resource('blogs', BlogController::class);

// Route untuk menyimpan komentar pada blog
Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::resource('comments', CommentController::class)->except(['create', 'store']); // Untuk admin atau pengelolaan komentar.

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/article/{slug}', [NewsController::class, 'show'])->name('article');

Route::middleware('auth')->group(function () {
    Route::get('/admin/create', [NewsController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [NewsController::class, 'store'])->name('admin.store');
});
