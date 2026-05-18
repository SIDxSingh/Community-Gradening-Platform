<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GardenController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\GardenCommentController;
use App\Http\Controllers\GardenLikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);
});

Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

Route::post('/gardens/{garden}/comments', [GardenCommentController::class, 'store'])->name('gardens.comments.store');
Route::post('/gardens/{garden}/like', [GardenLikeController::class, 'toggle'])->name('gardens.like');

Route::middleware('auth')->group(function () {
    Route::get('/gardens/{garden}/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/gardens/{garden}/messages', [MessageController::class, 'store'])->name('messages.store');
});

Route::middleware([\App\Http\Middleware\LogGardenAccess::class])->group(function () {

    Route::resource('gardens', GardenController::class);
    Route::resource('plants', PlantController::class);
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/gardens/{garden}/approve', [AdminController::class, 'approveGarden'])->name('gardens.approve');
    Route::delete('/gardens/{garden}', [AdminController::class, 'deleteGarden'])->name('gardens.delete');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::delete('/comments/{comment}', [AdminController::class, 'deleteComment'])->name('comments.delete');
});
