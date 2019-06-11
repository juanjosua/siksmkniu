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
Route::get('/admin_dataPegawai', 'AdminController@dataPegawai');
Route::get('/admin_dataSurat', 'AdminController@dataSurat');

//data pegawai
Route::get('/admin_dataPegawai/promotion/{id}', 'AdminController@promoteUser');
Route::get('/admin_dataPegawai/demotion/{id}', 'AdminController@demoteUser');
Route::delete('/admin_dataPegawai/delete/{id}', 'AdminController@destroyUser');

//main func rout
Route::get('/unggahSurat', 'SuratController@createSurat');
Route::post('/unggahSurat/post', 'SuratController@storeSurat');

//halaman surat baru
Route::get('/surat', 'SuratController@showSurat'); //page surat baru untuk staff atau pimpinan setelah upload

//rute surat
Route::get('/surat/proses/{id}', 'SuratController@prosesSurat'); //status ++
Route::get('/surat/detail/{id}', 'SuratController@detailSurat'); //detail surat
Route::get('/surat/cancel/{id}', 'SuratController@cancelSurat'); //surat tidak jadi ditinjau
Route::get('/surat/edit/{id}', 'SuratController@editSurat');   //buka halaman edit surat
Route::patch('/surat/edit/update/{id}', 'SuratController@updateSurat'); //menyimpan hasil editing surat

//rute disposisis
Route::get('/disposisi', 'DisposisiController@index');
Route::get('/disposisi/detail/{id}', 'DisposisiController@showDisposisi'); //detail disposisi
Route::get('/disposisi/selesai/{id}', 'DisposisiController@updateDisposisi'); //selesai salah satu disposisi
Route::post('/disposisi/baru/', 'DisposisiController@storeDisposisi'); //pimpinan memberikan dispo baru

//rute arsip
Route::get('/arsip', 'ArsipController@');
