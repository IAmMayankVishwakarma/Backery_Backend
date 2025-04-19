<?php

use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [AuthController::class, 'logout']);
      Route::get('user', [AuthController::class, 'user']);
      Route::apiResource('contacts',ContactController::class);
      Route::apiResource('reservation',ReservationController::class);
    });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
