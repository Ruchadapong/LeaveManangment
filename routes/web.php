<?php
use Illuminate\Routing\RouteGroup;

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
Route::get('/confirm/{code}', 'SigninController@confirmAccount')->name('confirm');
Route::match(['get', 'post'], '/forgot-password', 'SigninController@forgotPassword')->name('forgot-password');
Route::get('/logout', 'SigninController@logout')->name('logout');



Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('leave-management', 'SigninController@dashboard')->name('leave-management');
    Route::get('/staff', 'StaffController@add')->name('staff.view');
});

// Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
//     Route::match(['get', 'post'], '/view', 'StaffController@add')->name('view');
// });
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/leave-management', 'SigninController@dashboard')->name('leave-management');
// });



Route::get('/home', 'HomeController@index')->name('home');
