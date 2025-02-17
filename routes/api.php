<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ChangeForgotPasswordControllerController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\workshopController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('register', [AuthController::class, 'register'])
//     ->name('register');

// Route::post('login', [AuthController::class, 'login'])
//     ->name('login');



Route::group(['middleware' => 'api'], function ($router) {

    // Auth
    require __DIR__ . '/api_routes/auth.php';

    // Contacts
    require __DIR__ . '/api_routes/contact.php';

   

    // Registros desde landing o front
    require __DIR__ . '/api_routes/registroLanding.php';

    // doctores
    require __DIR__ . '/api_routes/doctor.php';

    // users
    require __DIR__ . '/api_routes/users.php';
    
    // profile
    require __DIR__ . '/api_routes/profile.php';
    // types
    require __DIR__ . '/api_routes/types.php';
    
    //subcripcion
    require __DIR__ . '/api_routes/subcripcion.php';



 Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])
        ->name('forgot.password');

    Route::post('/change-forgot-password', [ChangeForgotPasswordControllerController::class, 'changeForgotPassword'])
        ->name('change.forgot.password');


    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
        ->name('reset.password');

    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])
        ->name('change.password');

    Route::post('/contact/form', [ContactFormController::class, 'contactStore'])
        ->name('contact.store');

    Route::get('/cache', function () {
        Artisan::call('cache:clear');
        return "Limpiar Cache";
    });

    Route::get('/optimize', function () {
        Artisan::call('optimize:clear');
        return "Optimización de Laravel";
    });

    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        return "Storage Link";
    });


    Route::get('/migrate-seed', function () {
        Artisan::call('migrate:refresh --seed');
        return "Migrate seed";
    });




    // Route::post('/workshop/store', [workshopController::class, 'workshopStore'])
    //     ->name('workshop.store');

    //     Route::post('/workshop/upload', [workshopController::class, 'upload'])
    //     ->name('workshop.upload');


});
