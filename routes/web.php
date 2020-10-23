<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', 'LandingController@index')->middleware('guest')->name('landing.index');

Route::group(['prefix' => 'auth'], function (){
    Route::post('/', 'Auth\LoginController@index')->name('login.index');
    Route::get('/twitter/callback', 'Auth\LoginController@store')->name('login.store');
    Route::get('/logout', 'Auth\LoginController@logoutAndRedirect')->name('login.logout');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('home', 'DashboardController@index')->name('dashboard.index');
    Route::get('settings', 'DashboardController@settings')->name('dashboard.settings');
});


