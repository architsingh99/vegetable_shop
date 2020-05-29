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

Route::post('updatePassword', 'VegetableEccomerce@updatePassword');

Route::get('check_out','VegetableEccomerce@checkout')->middleware('auth');

Route::post('add_to_cart', 'VegetableEccomerce@addToCart')->middleware('auth');

Route::post('update_cart', 'VegetableEccomerce@update_cart')->middleware('auth');

Route::post('getHash', 'VegetableEccomerce@getHash')->middleware('auth');

Route::post('getHash2', 'VegetableEccomerce@getHash2')->middleware('auth');

Route::get('remove_from_cart/{cart_id}', 'VegetableEccomerce@remove_from_cart')->middleware('auth');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('check_pincode/{pincode}', 'VegetableEccomerce@check_pincode');

Route::post('post_orders', 'VegetableEccomerce@post_orders')->middleware('auth');

Route::post('post_orders_subscription', 'VegetableEccomerce@post_orders_subscription')->middleware('auth');

Route::post('paymentPayU', 'VegetableEccomerce@paymentPayU')->middleware('auth');

Route::post('failed_payment', function () {
    return view('failed_payment');
});

Route::get('utilites', 'VegetableEccomerce@getUtilities');

Route::post('save_utilities', 'VegetableEccomerce@saveUtilities')->middleware('auth');

Route::get('accept', 'VegetableEccomerce@accept')->name('accept');

Route::get('pay-success/{order_id}', 'VegetableEccomerce@success');

Route::get('send_message/{number}', 'VegetableEccomerce@getUserNumber');

Route::get('/whatsapp', 'VegetableEccomerce@test');

Route::get('account','HomeController@account')->middleware('auth');

# Call Route
Route::get('payment/{id}', ['as' => 'payment', 'uses' => 'PaymentController@payment'])->middleware('auth');

# Status Route
Route::get('payment/status', ['as' => 'payment.status', 'uses' => 'PaymentController@status'])->middleware('auth');

Route::get('cash_on_delivery/{id}', ['as' => 'cash_on_delivery', 'uses' => 'VegetableEccomerce@cashOnDelivery'])->middleware('auth');

Route::get('cash_on_delivery_subscription/{id}', ['as' => 'cash_on_delivery_subscription', 'uses' => 'VegetableEccomerce@cashOnDeliverySubscription'])->middleware('auth');

Route::get('payment_success/{id}', ['as' => 'payment_success', 'uses' => 'VegetableEccomerce@paymentSuccess'])->middleware('auth');

Route::get('payment_success_subscription/{id}', ['as' => 'payment_success', 'uses' => 'VegetableEccomerce@paymentSuccessSubscription'])->middleware('auth');

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
Route::get('send_otp/{mobile}/{key}', 'VegetableEccomerce@sendOtp');
Route::get('loginViaOtp/{mobile}/{otp}', 'VegetableEccomerce@loginViaOtp');

Route::get('subscribe/{id}', 'VegetableEccomerce@subscribe');

Route::get('coming_soon', function () {
    return view('coming_soon');
});