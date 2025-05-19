<?php

use App\Http\Controllers\RankController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// redirection
Route::get('/home', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Learn related route
Route::middleware(['auth'])->group(function () {
    Route::view('/learn', "learn.index")->name('learn.index');
    Route::get('/learn/html', [LearnController::class, 'learnHtml'] )->name('learn.html');
    Route::get('/learn/css', [LearnController::class, 'learnCss'] )->name('learn.css');
});

// Quiz related route
Route::middleware(['auth'])->group(function () {
    Route::view('/quiz', "quiz.index")->name('quiz.index');
    Route::get('/quiz/html', [QuizController::class, 'quizHtml'] )->name('quiz.html');
    Route::get('/quiz/css', [QuizController::class, 'quizCss'] )->name('quiz.css');

    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

    Route::post('/quiz/test', [QuizController::class, 'submitTest'])->name('quiz.test');
});

// Rank related route
Route::middleware(['auth'])->group(function () {
    Route::get('/ranking', [RankController::class, 'index'])->name('rank.index');
});


require __DIR__ . '/auth.php';
