<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::get('test', fn () => 'test successful');

    /**
     * Feedbacks
     */
    Route::get('feedbacks', [FeedbackController::class, 'index']);
    Route::post('feedback', [FeedbackController::class, 'store']);
});
