<?php

use App\Http\Controllers\LibraryController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [LibraryController::class, 'index'])->name('home');
    Route::post('/home', [LibraryController::class, 'search'])->name('home.search');
    Route::post('/library/toggle-bookmark', [LibraryController::class, 'update'])->name('library.update');
});

require __DIR__.'/settings.php';
