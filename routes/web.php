<?php

use App\Http\Controllers\LearnController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});


// Learn related route
Route::middleware(['auth'])->group(function () {
    Route::view('/learn', "learn.index")->name('learn.index');
    Route::get('/learn/content', [LearnController::class, 'index'] )->name('learn.content');
});

// Quiz related route
Route::middleware(['auth'])->group(function () {
    Route::view('/quiz', "quiz.index")->name('quiz.index');
});



require __DIR__ . '/auth.php';
