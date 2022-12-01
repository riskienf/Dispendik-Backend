<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('activities', ActivityController::class);
    Route::apiResource('institutions', InstitutionController::class)->except('show');
    Route::get('/profile', [AuthController::class, 'getProfile'])->name('get.profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('update.profile');


    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->middleware('guest');
    Route::post('login', [AuthController::class, 'login'])->middleware('guest');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
});
