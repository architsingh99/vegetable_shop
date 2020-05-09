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

Route::get('check_out','VegetableEccomerce@checkout')->middleware('auth');

Route::post('add_to_cart', 'VegetableEccomerce@addToCart')->middleware('auth');

Route::post('update_cart', 'VegetableEccomerce@update_cart')->middleware('auth');

Route::get('remove_from_cart/{cart_id}', 'VegetableEccomerce@remove_from_cart')->middleware('auth');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('check_pincode/{pincode}', 'VegetableEccomerce@check_pincode');

Route::post('post_orders', 'VegetableEccomerce@post_orders')->middleware('auth');

Route::get('pay-success/{order_id}', 'VegetableEccomerce@success');

Route::get('send_message/{number}', 'VegetableEccomerce@getUserNumber');

Route::get('/whatsapp', 'VegetableEccomerce@test');

Route::get('account','HomeController@account')->middleware('auth');

# Call Route
Route::get('payment', ['as' => 'payment', 'uses' => 'PaymentController@payment'])->middleware('auth');

# Status Route
Route::get('payment/status', ['as' => 'payment.status', 'uses' => 'PaymentController@status'])->middleware('auth');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes(['verify' => true]);

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('track_orders', 'VegetableEccomerce@trackOrders')->middleware('auth');
Route::get('sub_orders/{order_id}', 'VegetableEccomerce@subOrders');

Route::get('deliver', 'VegetableEccomerce@deliver')->name('deliver');
Route::get('categories/{id}', 'VegetableEccomerce@categoriesGet');
