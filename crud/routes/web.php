<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// practice crud 
Route::get('/product', [ProductController::class, 'index'])->name('index');
Route::get('/product/create', [ProductController::class, 'create'])->name('create');
Route::post('/product', [ProductController::class, 'store'])->name('store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('destroy');

// project supplies
Route::get('/supply', [SupplyController::class, 'index'])->name('supply.index');

Route::post('/supply', [SupplyController::class, 'store'])->name('supply.store');
Route::put('/supply/{supply}/update', [SupplyController::class, 'update'])->name('supply.update');
Route::delete('/supply/{supply}/destroy', [SupplyController::class, 'destroy'])->name('supply.destroy');
