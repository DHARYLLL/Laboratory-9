<?php

use App\Http\Controllers\IndexController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [IndexController::class, 'index'])->name('index');
Route::get('/index', [IndexController::class, 'indexx'])->name('indexx');
Route::post('/index', [IndexController::class, 'store'])->name('store');
