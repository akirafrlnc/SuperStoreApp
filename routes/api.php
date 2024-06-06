<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AllyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Prefix all API routes with 'api'
// Product Routes
// Route::apiResource('/products', 'App\Http\Controllers\ProductController');
Route::apiResource('/products', ProductController::class);

// Category Routes
Route::apiResource('/categories', CategoryController::class);

// Additional route to get products by category
Route::get('/categories/{category}/products', [CategoryController::class, 'products']);
// Routes for Ally CRUD operations
Route::apiResource('/allies', AllyController::class);
Route::get('/ally/{url}/products', 'AllyController@products');
// Route::get('/ally/{ally:slug}/products', 'AllyController@products');
// Route::get('/api/products', 'ProductController@index');
