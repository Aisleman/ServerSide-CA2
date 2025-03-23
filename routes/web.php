<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin-only: View & Delete Users
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});

// Blog Review (Admin & Editor)
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    Route::get('/blogs/review', [PostsController::class, 'review'])->name('blogs.review');
    Route::post('/blogs/{slug}/approve', [PostsController::class, 'approve'])->name('blogs.approve');
    Route::post('/blogs/{slug}/decline', [PostsController::class, 'decline'])->name('blogs.decline');
});

// Blog Routes
Route::get('/blogs', [PostsController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [PostsController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [PostsController::class, 'store'])->name('blogs.store');

// Blog CRUD
Route::get('/blogs/{slug}/edit', [PostsController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{slug}', [PostsController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{slug}', [PostsController::class, 'destroy'])->name('blogs.destroy');
Route::get('/blogs/{slug}', [PostsController::class, 'show'])->name('blogs.show');

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

// Authenticated User Profile (Self-service only)
Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/name', [ProfileController::class, 'updateName'])->name('update.name');
    Route::put('/email', [ProfileController::class, 'updateEmail'])->name('update.email');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('update.password');
});
