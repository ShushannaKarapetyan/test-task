<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
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

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/user', [AuthController::class, 'user']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::get('/attach-role', [UsersController::class, 'userRoles']);
Route::post('/attach-role', [UsersController::class, 'attachRole']);

Route::group(['middleware' => 'auth:api'], function () {
    //Route::get('/attach-role', [UsersController::class, 'userRoles']);
    //Route::post('/attach-role', [UsersController::class, 'attachRole']);


//    Route::get('users', [UsersController::class, 'index'])->middleware('isAdmin');
//    Route::get('users/{id}', [UsersController::class, 'show'])->middleware('isAdminOrSelf');
});
