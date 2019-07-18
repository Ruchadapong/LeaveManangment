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
        //home page
        Route::get('/', 'SigninController@dashboard')->name('leave-management');
        //delete staff
        Route::match(['get', 'post'], 'delete/{id}', 'StaffController@delete')->name('staff.delete');
        //group staff
        Route::group(['prefix' => 'staff'], function () {
            //view staff
            Route::get('/', 'StaffController@view')->name('staff.view');
            //add staff
            Route::match(['get', 'post'], '/add-staff', 'StaffController@add')->name('staff.add');
            //edit staff
            Route::match(['get', 'post'], '/edit-staff/{id}', 'StaffController@edit')->name('staff.edit');
            //search staff 
            Route::post('/search', 'StaffController@search')->name('staff.search');
        });

        //group department
        Route::group(['prefix' => 'department'], function () {
            //view department
            Route::get('/', 'DepartmentController@view')->name('department.view');
            //add department
            Route::match(['get', 'post'], '/add-department', 'DepartmentController@add')->name('department.add');
            //edit department
            Route::match(['get', 'post'], '/edit-department/{id}', 'DepartmentController@edit')->name('department.edit');
            //search department
            Route::post('/search-dept', 'DepartmentController@search')->name('department.search');
            //delete department
            Route::match(['get', 'post'], 'delete-dept/{id}', 'DepartmentController@delete')->name('department.delete');
        });
    });
});






Route::get('/home', 'HomeController@index')->name('home');
