<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\fdtListContoller;
use Illuminate\Http\Request;
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

// public routes 
Route::post('login', [AuthController::class, 'login']);


// Protected route
Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::get('fdtList', [fdtListContoller::class, 'index']);
});
