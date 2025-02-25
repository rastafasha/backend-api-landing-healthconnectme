<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroLandingController;

//pagos
Route::get('/registrols', [registroLandingController::class, 'index'])
    ->name('registrol.index');

Route::get('/registrols/config/{type_id}', [registroLandingController::class, 'config'])
    ->name('registrol.config');

Route::post('/registrol/store', [registroLandingController::class, 'registrolStore'])
    ->name('registrol.store');

Route::get('/registrol/show/{workshop}', [registroLandingController::class, 'registrolShow'])
    ->name('registrol.show');

Route::put('/registrol/update/{id}', [registroLandingController::class, 'registrolUpdate'])
    ->name('registrol.update');
Route::put('/registrol/sendinvitation/{id}', [registroLandingController::class, 'sendInvitation'])
    ->name('registrol.sendInvitation');

Route::delete('/registrol/destroy/{registrol:id}', [registroLandingController::class, 'registrolDestroy'])
    ->name('registrol.destroy');

Route::get('registrol/recientes/', [registroLandingController::class, 'recientes'])
    ->name('registrol.recientes');

Route::post('/registrol/upload', [registroLandingController::class, 'upload'])
    ->name('registrol.upload');

Route::delete('/registrol/delete-foto/{id}', [registroLandingController::class, 'deleteFotoregistrol'])
    ->name('registrol.deleteFotoregistrol');

Route::get('/registrol/search/', [registroLandingController::class, 'search'])
    ->name('registrol.search');

Route::put('/registrol/update/status/{registrol:id}', [registroLandingController::class, 'registrolUpdateStatus'])
    ->name('registrol.registrolUpdateStatus');

Route::put('/registrol/update/type/{registrol:id}', [registroLandingController::class, 'registrolUpdateType'])
    ->name('registrol.registrolUpdateType');

