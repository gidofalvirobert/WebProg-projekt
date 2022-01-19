<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "API" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/index',[AdminController::class,'index']);
    Route::get('/showclient/{id}',[AdminController::class,'show']);

    Route::post('/addclient',[AdminController::class,'store']);
    Route::post('/update/{id}',[AdminController::class,'update']);
    Route::delete('/delete/{id}',[AdminController::class,'destroy']);

