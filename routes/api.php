<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::post('register', [UsersController::class, 'register']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::group(
        ['prefix' => 'auth'],
        function () {
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('me', [AuthController::class, 'me']);
            Route::post('update-me', [AuthController::class, 'updateMe']);
        }
    );
});
