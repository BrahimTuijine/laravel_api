<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

// Route::get("/products", [ProductController::class, "index"]);
// Route::post("/products", [ProductController::class, "store"]);


// public route 
Route::post("/register",[ AuthController::class , "register"]);
Route::get("/products",[ ProductController::class , "index"]);
Route::get("/products/{id}",[ ProductController::class , "show"]);
Route::get("/products/search/{name}", [ProductController::class, "searchByName"]);


// Protected route
Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::post("/logout" , [AuthController::class , "logout"]);
    Route::post("/products", [ProductController::class, "store"]);
    Route::delete("/products", [ProductController::class, "destroy"]);
    Route::put("/products", [ProductController::class, "update"]);
});
