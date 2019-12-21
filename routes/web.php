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
Route::get('/x', function () {
    return view('test');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user/{id}','ProfilController@detail');

Route::get('/dokter','DokterController@list');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/artikel','ArtikelController@index');

Route::get('/artikel/{slug}','ArtikelController@detail');

Route::get('/tambah-artikel','ArtikelController@linkOncreate');

Route::post('/buat-artikel','ArtikelController@store');

Route::post('/buat-komen','KomenController@create');

Route::get('/edit-artikel/{id}','ArtikelController@edit');

Route::post('/edit-artikel-sekarang','ArtikelController@update');

Route::post('/delete-artikel-now','ArtikelController@delete');

Route::get('/register-dokter','DokterController@index');

Route::post('/registrasi-dokter','DokterController@createDokter');

Route::post('/edit-komen','KomenController@update');

Route::post('/delete-komen','KomenController@destroy');

Route::group(['middleware' => ['auth','checkRole:dokter,user']], function(){

Route::get('/setting-profil','ProfilController@display');

Route::post('/ubah-data-umum','ProfilController@updateUmum');

Route::post('/ubah-data-password','ProfilController@updatePass');

});

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

Route::get('/user-list','ProfilController@listUser');

});


Route::get('/cari','RouteController@index');

Route::get('/cari/my-location','RouteController@hasil');