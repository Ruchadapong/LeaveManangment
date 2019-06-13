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



Auth::routes();

Route::match(['get', 'post'], '/', 'SigninController@login')->name('login');
Route::match(['get', 'post'], '/register', 'SigninController@register')->name('register');

Route::get('/leave-management', 'SigninController@dashboard')->name('leave-management');





Route::get('/home', 'HomeController@index')->name('home');
