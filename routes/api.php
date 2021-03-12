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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/role', 'RoleController@store');
Route::post('/auth-login', 'UserController@login');
Route::post('/create-order', 'OrderController@store');
Route::post('/auth-register', 'UserController@register');
Route::get('/logout', 'UserController@logout');
Route::post('/cat', 'CategoryController@store');