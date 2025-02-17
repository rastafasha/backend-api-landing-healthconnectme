<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\typeController;

Route::resource('types', typeController::class);
Route::post('type/store', [typeController::class, 'store'])->name('store');
Route::get('type/show/{id}', [typeController::class, 'show'])->name('show');
Route::put('type/update/{id}', [typeController::class, 'update'])->name('update');
Route::delete('type/destroy/{id}', [typeController::class, 'destroy'])->name('destroy');

