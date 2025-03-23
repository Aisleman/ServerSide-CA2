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
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [PostsController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [PostsController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [PostsController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{post}', [PostsController::class, 'show'])->name('blogs.show');
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::middleware(['auth', 'role:admin,editor'])->group(function ()
{
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
    Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
    Route::get('/artists/{id}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
    Route::put('/artists/{id}', [ArtistController::class, 'update'])->name('artists.update');
    Route::delete('/artists/{id}', [ArtistController::class, 'destroy'])->name('artists.destroy');
});
Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/profile', [PagesController::class, 'profile'])->name('profile')->middleware('auth');


