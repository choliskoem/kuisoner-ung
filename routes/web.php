<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypeOptionController;
use App\Http\Controllers\TypeQuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');
    Route::resource('user', UserController::class);
    Route::resource('option', OptionController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('type', TypeController::class);
    Route::resource('typeoption', TypeOptionController::class);
    Route::resource('typequestion', TypeQuestionController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('schedule', ScheduleController::class);
});

// Route::get('/login', function () {
//     return view('pages.auth.login');
// })->name('login');
// Route::get('/register', function () {
//     return view('pages.auth.register');
// })->name('register');
