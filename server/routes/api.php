<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Routes for category
Route::get("/categories", [CategoryController::class, "index"]);
Route::get("/categories/{id}", [CategoryController::class, "show"]);
Route::get("/categories/{id}/edit", [CategoryController::class, "edit"]);
Route::get("/categories/{id}/delete", [CategoryController::class, "delete"]);
Route::post("/categories/store", [CategoryController::class, "store"]);
Route::post("/categories/update", [CategoryController::class, "update"]);

//Routes for products
Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/{id}", [ProductController::class, "show"]);
Route::post("/products/store", [ProductController::class, "store"]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
