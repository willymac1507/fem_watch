<?php

use App\Http\Controllers\LibraryController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [LibraryController::class, 'index'])->name('home');
    Route::post('/library/toggle-bookmark', [LibraryController::class, 'store'])->name('library.store');
});

require __DIR__.'/settings.php';
