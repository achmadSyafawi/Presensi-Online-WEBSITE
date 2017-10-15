<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    // start - lokasi
    Route::get('lokasi', 'LokasiController@index');
    Route::get('lokasi/create', 'LokasiController@create');
    Route::post('lokasi/create', 'LokasiController@store');
    Route::get('lokasi/delete/{id}', 'LokasiController@destroy');
    Route::get('lokasi/edit/{id}', 'LokasiController@edit');
    Route::patch('lokasi/update/{id}',
    [
        'as' => 'admin.lokasi.update',
        'uses' => 'LokasiController@update'
    ]);
    // end - Lokasi

    // start - Absensi
    Route::get('absensi', 'AbsensiController@index');
    Route::get('absensiBaru', 'AbsensiController@absensiBaru');
    Route::get('absensiDitolak', 'AbsensiController@absensiDitolak');
    Route::get('absensi/create', 'AbsensiController@create');
    Route::post('absensi/create', 'AbsensiController@store');
    Route::get('absensi/delete/{id}', 'AbsensiController@destroy');
    Route::get('absensi/edit/{id}', 'AbsensiController@edit');
    Route::get('absensi/{nidn}', 'AbsensiController@graf');
    Route::get('absensi/accept/{id}', 'AbsensiController@updateAccept');
    Route::get('absensi/decline/{id}', 'AbsensiController@updateDecline');
    Route::patch('absensi/update/{id}',
    [
        'as' => 'admin.absensi.update',
        'uses' => 'AbsensiController@update'
    ]);
    // end - Absensi

    Route::get('updateLibur', 'LiburController@laporan');

    // start - Pegawai
    Route::get('pegawai', 'PegawaiController@index');
    Route::get('pegawai/create', 'PegawaiController@create');
    Route::post('pegawai/create', 'PegawaiController@store');
    Route::get('pegawai/delete/{id}', 'PegawaiController@destroy');
    Route::get('pegawai/edit/{id}', 'PegawaiController@edit');
    Route::patch('pegawai/update/{id}',
    [
        'as' => 'admin.pegawai.update',
        'uses' => 'PegawaiController@update'
    ]);
    // end - Pegawai

    // start - user
    Route::get('user', 'UserController@index');
    Route::get('user/create', 'UserController@create');
    Route::post('user/create', 'UserController@store');
    Route::get('user/delete/{id}', 'UserController@destroy');
    Route::get('user/edit/{id}', 'UserController@edit');
    Route::patch('user/update/{id}',
    [
        'as' => 'admin.user.update',
        'uses' => 'UserController@update'
    ]);
    // end - user

    //start pdf invoice
    Route::get('report/{id}', 'AbsensiController@laporan');
    //end invoice

});
Route::auth();

Route::get('/home', 'HomeController@index');
