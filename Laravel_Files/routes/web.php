<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');

// Biodata Routes
Route::get('/biodata', [App\Http\Controllers\BiodataController::class, 'biodata'])->name('biodata.index');
Route::get('/biodata/create', [App\Http\Controllers\BiodataController::class, 'create'])->name('biodata.create');
Route::post('/biodata/store', [App\Http\Controllers\BiodataController::class, 'store'])->name('biodata.store');
Route::get('/biodata/edit/{id}', [App\Http\Controllers\BiodataController::class, 'edit'])->name('biodata.edit');
Route::put('/biodata/update/{id}', [App\Http\Controllers\BiodataController::class, 'update'])->name('biodata.update');
Route::delete('/biodata/delete/{id}', [App\Http\Controllers\BiodataController::class, 'destroy'])->name('biodata.destroy');

// Produk Routes
Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'produk'])->name('produk.index');
Route::get('/produk/create', [App\Http\Controllers\ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/delete/{id}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk.destroy');
