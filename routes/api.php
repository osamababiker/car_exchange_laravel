<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarsController;
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
    /** add new car  */
    Route::post('/cars/store', [CarsController::class, 'store']);
});


/** to login user in */
Route::post('/auth/login', [AuthController::class, 'login']);

/** to register a new user  */
Route::post('/auth/register', [AuthController::class, 'register']);

/** cars list  */
Route::get('/cars', [CarsController::class, 'index']);
