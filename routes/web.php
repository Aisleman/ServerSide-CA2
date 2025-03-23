<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArtistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PagesController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Blog Routes
Route::get('/blogs', [PostsController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [PostsController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [PostsController::class, 'store'])->name('blogs.store');

Route::get('/blogs/{slug}/edit', [PostsController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{slug}', [PostsController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{slug}', [PostsController::class, 'destroy'])->name('blogs.destroy');
Route::get('/blogs/{slug}', [PostsController::class, 'show'])->name('blogs.show');

// Blog Review (Admin & Editor)
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    Route::get('/blogs/review', [PostsController::class, 'review'])->name('blogs.review');
    Route::post('/blogs/{id}/approve', [PostsController::class, 'approve'])->name('blogs.approve');
    Route::post('/blogs/{id}/decline', [PostsController::class, 'decline'])->name('blogs.decline');
});

// Artist Routes
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
    Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
    Route::get('/artists/{id}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
    Route::put('/artists/{id}', [ArtistController::class, 'update'])->name('artists.update');
    Route::delete('/artists/{id}', [ArtistController::class, 'destroy'])->name('artists.destroy');
});
Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');

Route::get('/profile', [PagesController::class, 'profile'])->name('profile')->middleware('auth');
