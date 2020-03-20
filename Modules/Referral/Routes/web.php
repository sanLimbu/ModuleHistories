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
// Route::group(['prefix' => 'referrals','namespace' => 'Referrals'], function() {
//     Route::get('/', 'ReferralController@index')->name('referrals');
//     Route::post('/', 'ReferralController@store');
// });


Route::prefix('referrals')->group(function() {
    Route::get('/', 'ReferralController@index')->name('referrals');
    Route::post('/', 'ReferralController@store');
});

Route::prefix('subscriptions')->group(function() {
    Route::get('/', 'SubscriptionController@index')->name('subscriptions');
    Route::post('/', 'SubscriptionController@store');
});
