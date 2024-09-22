<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/product/{id}', [ProductController::class, 'getProduct']);
Route::get('/products/search', [ProductController::class, 'searchProducts']);
Route::get('/products/limited', [ProductController::class, 'getLimitedProducts']);
Route::get('/products/sort', [ProductController::class, 'sortProducts']);
Route::get('/products/categories', [ProductController::class, 'getCategories']);
Route::get('/products/category/{category}', [ProductController::class, 'getProductsByCategory']);
Route::post('/products/add', [ProductController::class, 'addProduct']);
Route::put('/products/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);

