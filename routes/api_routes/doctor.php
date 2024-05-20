<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\doctorController;

//pagos
Route::get('/doctors', [doctorController::class, 'index'])
    ->name('doctor.index');

Route::post('/doctor/store', [doctorController::class, 'doctorStore'])
    ->name('doctor.store');

Route::get('/doctor/show/{workshop}', [doctorController::class, 'doctorShow'])
    ->name('doctor.show');

Route::put('/doctor/update/{id}', [doctorController::class, 'doctorUpdate'])
    ->name('doctor.update');

Route::delete('/doctor/destroy/{doctor:id}', [doctorController::class, 'doctorDestroy'])
    ->name('doctor.destroy');

Route::get('doctor/recientes/', [doctorController::class, 'recientes'])
    ->name('doctor.recientes');

Route::post('/doctor/upload', [doctorController::class, 'upload'])
    ->name('doctor.upload');

Route::delete('/doctor/delete-foto/{id}', [doctorController::class, 'deleteFotodoctor'])
    ->name('doctor.deleteFotodoctor');

Route::get('/doctor/search/', [doctorController::class, 'search'])
    ->name('doctor.search');

Route::put('/doctor/update/status/{doctor:id}', [doctorController::class, 'doctorUpdateStatus'])
    ->name('doctor.status');

