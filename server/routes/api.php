<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Routes for category
Route::prefix("/categories")->group(function() {
    Route::get("/", [CategoryController::class, "index"]);
    Route::get("/{id}", [CategoryController::class, "show"]);
    Route::get("/{id}/edit", [CategoryController::class, "edit"]);
    Route::get("/{id}/delete", [CategoryController::class, "delete"]);
    Route::post("/store", [CategoryController::class, "store"]);
    Route::post("/update", [CategoryController::class, "update"]);
});

//Routes for products

Route::prefix("/products")->group(function() {
    Route::get("/products", [ProductController::class, "index"]);
    Route::get("/products/{id}", [ProductController::class, "show"]);
    Route::post("/products/store", [ProductController::class, "store"]);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
