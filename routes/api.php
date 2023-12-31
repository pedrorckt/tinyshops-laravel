<?php

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

Route::get('/me', 'App\Http\Controllers\ProductController@me');

Route::resources([
    'shops' => 'App\Http\Controllers\ShopController',
    'users' => 'App\Http\Controllers\UserController',
    'products' => 'App\Http\Controllers\ProductController',
    'categories' => 'App\Http\Controllers\CategoryController',
], [
    'except' => ['create', 'edit'],
]);
