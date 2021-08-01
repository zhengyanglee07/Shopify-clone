<?php

use App\Http\Controllers\Api\AdminDetailController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\UsersDetailController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::namespace('Api')->group(function () {
//     Route::get('/users', [UsersController::class, 'index']);
// });

Route::namespace('Api')->group(function () {
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/{user}', [UsersController::class, 'show']);
    Route::put('/users/{user}', [UsersController::class, 'update']);
    Route::delete('/users/{user}', [UsersController::class, 'destroy']);
    Route::post('/users', [UsersController::class, 'store']);
});

Route::namespace('Api')->group(function () {
    Route::get('/usersDetail', [UsersDetailController::class, 'index']);
    Route::get('/usersDetail/{usersDetail}', [UsersDetailController::class, 'show']);
    Route::put('/usersDetail/{usersDetail}', [UsersDetailController::class, 'update']);
    Route::delete('/usersDetail/{store}', [UsersDetailController::class, 'destroy']);
    Route::post('/usersDetail', [UsersDetailController::class, 'store']);
    Route::post('/usersDetail/validator', [UsersDetailController::class, 'validator']);
});

Route::namespace('Api')->resource('adminDetail', AdminDetailController::class);
Route::namespace('APi')->post('adminDetail/validator', [AdminDetailController::class, 'validator']);

Route::namespace('Api')->group(function () {
    Route::get('/stores', [StoreController::class, 'index']);
    Route::get('/stores/{store}', [StoreController::class, 'show']);
    Route::put('/stores/{store}', [StoreController::class, 'update']);
    Route::delete('/stores/{store}', [StoreController::class, 'destroy']);
    Route::post('/stores', [StoreController::class, 'store']);
    Route::post('/stores/validator', [StoreController::class, 'validator']);
    Route::get('/stores/getId/{storeName}', [StoreController::class, 'getStoreId']);
});

Route::namespace('Api')->resource('products', ProductsController::class);
Route::namespace('APi')->get('products/search/{id}', [ProductsController::class, 'getProduct']);
Route::namespace('APi')->get('products/count/{product}', [ProductsController::class, 'countProduct']);
Route::namespace('APi')->get('products/{storeId}/{id}', [ProductsController::class, 'search']);
Route::namespace('APi')->post('products/validator', [ProductsController::class, 'validator']);

Route::namespace('Api')->resource('carts', CartController::class);

Route::namespace('Api')->resource('orders', OrderController::class);

