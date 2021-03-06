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

Route::prefix('histories')->group(function() {
    Route::get('/', 'HistoriesController@index');
    Route::get('/article', 'ArticleController@index');
    Route::get('/users/{user}/history', 'HistoriesController@histories');
    Route::get('/articles/{article}/history','ArticleController@articleHistory');
});
