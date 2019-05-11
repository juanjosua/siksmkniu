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

//default route adalah login page
Route::get('/', function () {
    return view('welcome');
});

//login and register route
Route::get('/home', 'PegawaiController@index');
Route::get('/login', 'PegawaiController@login');
Route::post('/loginPost', 'PegawaiController@loginPost');
Route::get('/register', 'PegawaiController@register');
Route::post('/registerPost', 'PegawaiController@registerPost');
Route::get('/logout', 'PegawaiController@logout');

//login admin
Route::get('/admin', 'AdminController@login');
Route::post('/admin/loginPost', 'AdminController@loginPost');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin_dataPegawai', 'AdminController@index');
