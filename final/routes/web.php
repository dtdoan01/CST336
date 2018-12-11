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

Route::get('', 'HomeController@index')->name('home');
Route::any('search', 'HomeController@search')->name('search');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('', 'AdminController@reports')->name('admin');
    Route::get('games', 'AdminController@games')->name('admin.games');
    Route::get('report/average', 'AdminController@ajaxReportAverage')->name('admin.report.average');
    Route::get('report/genres', 'AdminController@ajaxReportGenres')->name('admin.report.genres');
    Route::get('add', 'AdminController@create')->name('admin.add');
    Route::post('add', 'AdminController@store')->name('admin.store');
    Route::get('{game}/edit', 'AdminController@edit')->name('admin.edit');
    Route::delete('{game}/delete', 'AdminController@delete')->name('admin.delete');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('cart', 'CartController@index')->name('cart');
Route::get('cart/add/{game}', 'CartController@add')->name('cart.add');
Route::get('cart/remove/{game}', 'CartController@remove')->name('cart.remove');
Route::post('cart/promo', 'CartController@promo')->name('cart.promo');
Route::get('cart/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('cart/confirm', 'CartController@confirm')->name('cart.confirm');

Route::get('store', 'HomeController@store')->name('store');
Route::get('store/recommended', 'HomeController@recommended')->name('store.recommended');
Route::get('store/latest', 'HomeController@latest')->name('store.latest');
Route::get('genre/{genre}', 'HomeController@genre')->name('store.genre');
Route::get('platform/{platform}', 'HomeController@platform')->name('store.platform');

Route::get('game/{game}', 'GameListingController@view')->name('game.view');
