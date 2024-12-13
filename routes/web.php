<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/cv', [CvController::class, 'store'])->name('cv.store');
    Route::resource('cv', CvController::class);
    Route::get('/dashboard', [CvController::class, 'dashboard'])->name('dashboard');
    Route::get('/cv/{id}/edit', [CvController::class, 'edit'])->name('cv.edit');
    Route::put('/cv/{id}', [CvController::class, 'update'])->name('cv.update');
});

require __DIR__.'/auth.php';
