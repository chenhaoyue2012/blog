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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['middleware' => ['auth','CheckAge']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home/userrole', 'HomeController@bindUserAndRole');
    Route::get('/home/rolepermission', 'HomeController@bindRoleAndPermission');

});
