<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\BidsController;
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

    /** to add new car */
    Route::post('/cars/store', [CarsController::class, 'store']);

    /** to add new bid */
    Route::post('/bids/store', [BidsController::class, 'store']);
});


/** to login user in */
Route::post('/auth/login', [AuthController::class, 'login']);

/** to register new user  */
Route::post('/auth/register', [AuthController::class, 'register']);

/** to get all cars */
Route::get('/cars', [CarsController::class, 'index']);

/** to get all bids */
Route::get('/bids', [BidsController::class, 'index']);
