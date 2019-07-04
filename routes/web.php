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

//login register page
Route::match(['get', 'post'], '/', 'SigninController@login')->name('login');
Route::match(['get', 'post'], '/register', 'SigninController@register')->name('register');
Route::get('/confirm/{code}', 'SigninController@confirmAccount')->name('confirm');
Route::match(['get', 'post'], '/forgot-password', 'SigninController@forgotPassword')->name('forgot-password');
Route::get('/logout', 'SigninController@logout')->name('logout');

//check email for register by js
Route::match(['get', 'post'], '/check-email', 'SigninController@checkEmail')->name('checkEmail');

//check name for register by js
Route::match(['get', 'post'], '/check-name', 'SigninController@checkName')->name('checkName');




Route::group(['middleware' => ['admin', 'auth']], function () {

    //group leave-management
    Route::group(['prefix' => 'leave-management'], function () {
        Route::get('/', 'SigninController@dashboard')->name('leave-management');
        Route::match(['get', 'post'], 'delete/{id}', 'StaffController@delete')->name('staff.delete');

        Route::group(['prefix' => 'staff'], function () {

            Route::get('/', 'StaffController@view')->name('staff.view');
            Route::match(['get', 'post'], '/add-staff', 'StaffController@add')->name('staff.add');
            Route::match(['get', 'post'], '/edit-staff/{id}', 'StaffController@edit')->name('staff.edit');
        });
    });
});






Route::get('/home', 'HomeController@index')->name('home');
