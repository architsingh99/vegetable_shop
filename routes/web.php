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
Route::get('/','VegetableEccomerce@get');

Route::get('check_out','VegetableEccomerce@checkout')->middleware('verified');

Route::post('add_to_cart', 'VegetableEccomerce@addToCart')->middleware('verified');

Route::post('update_cart', 'VegetableEccomerce@update_cart')->middleware('verified');

Route::get('remove_from_cart/{cart_id}', 'VegetableEccomerce@remove_from_cart')->middleware('verified');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('check_pincode/{pincode}', 'VegetableEccomerce@check_pincode');

Route::get('account','HomeController@account')->middleware('verified');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes(['verify' => true]);