<?php

use Illuminate\Http\Request;
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

Route::resource('orders', 'ordersAPIController');
Route::post('orders/action', 'ordersAPIController@action');
Route::post('orders/view', 'ordersAPIController@view');
Route::post('next', 'ordersAPIController@next');
Route::get('city/{id}', 'ordersAPIController@getkota');
Route::post('city', 'ordersAPIController@getkota');
Route::get('shift', 'ordersAPIController@shift');
