<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return abort(404);
    //return view('landing');
});
*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'ordersController@order')->name('wenseul');

Auth::routes(['register' => false]);

Route::get('qr/{id}', 'HomeController@generateqr')->name('qr');

Route::get('test', 'HomeController@test')->name('test');
Route::get('test2', 'HomeController@test2')->name('test2');
Route::get('test3', 'HomeController@test3')->name('test3');
Route::get('/login', function () {
    return abort(404);
    //return view('landing');
});

Route::get('manage/login', 'Auth\LoginController@showLoginForm')->name('mlogin');

Route::get('/order', 'ordersController@order')->name('wenseul');
Route::get('/tf', 'ordersController@transfer')->name('wenseuls');

Route::get('/order/{hash}', 'ordersController@orderConfirm')->name('order_confirm_get');
Route::get('/shift/{hash}', 'ordersController@orderShift')->name('order_shift_get');
Route::post('/shift/submit', 'ordersController@submitShift')->name('shift_submit');

Route::get('/checkslot', 'ordersController@checkslot')->name('checkslot');

Route::post('/submit', 'ordersController@submit')->name('order_submit');
Route::post('/confirm', 'ordersController@confirm')->name('order_confirm');
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/nope', 'HomeController@index')->name('home')->middleware('verified');
    Route::get('/manage', 'HomeController@manage')->name('manage')->middleware('verified');
    Route::get('/send/send_feedback', 'HomeController@sendFeedback');
});
