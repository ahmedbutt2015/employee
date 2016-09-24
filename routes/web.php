<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


use Illuminate\Support\Facades\Auth;

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/admin/login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth'],function() {

    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    });
//    Route::get('department/{id}', 'Department\\DepartmentController@indexSort');
//    Route::get('employee/{id}', 'Employee\\EmployeeController@indexSort');

    Route::get('/employee/{id}','Employee\EmployeeController@index');
    Route::resource('department', 'Department\DepartmentController');
    Route::resource('employee', 'Employee\EmployeeController');

});

