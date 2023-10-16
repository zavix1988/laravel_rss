<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\PostsController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [LoginController::class, 'login'] );

    Route::group(['middleware' => 'auth:api'], function() {
//        Route::post('logout', 'Api\Auth\LoginController@logout');
//        Route::post('token/check', 'Api\Auth\TokenController@check');
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource('posts', PostsController::class);
});
