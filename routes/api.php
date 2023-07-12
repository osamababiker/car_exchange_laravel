<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


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

/** for auth users only */
Route::middleware('auth:sanctum')->group(function () {
    /** to get user */
    Route::get('/user', [AuthController::class, 'user']);
});


/** to login user in */
Route::post('/auth/login', [AuthController::class, 'login']);
