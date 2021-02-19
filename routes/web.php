<?php

use Illuminate\Support\Facades\Route;

route::get('/data-subunit','SubunitController@index')->name('data-subunit');
route::get('/add-subunit','SubunitController@create')->name('add-subunit');
route::POST('/simpan-subunit','SubunitController@store')->name('simpan-subunit');
route::get('/hapus-subunit/{id}','SubunitController@destroy')->name('hapus-subunit');
route::get('/edit-subunit/{id}','SubunitController@show')->name('edit-subunit');
Route::post('update-subunit/{id}','SubunitController@update')->name('update-subunit');







Route::get('login','LoginController@index')->name('login');
route::post('/postlogin', 'LoginController@postLogin')->name('postLogin');
route::get('/keluar','LoginController@logout')->name('logOut');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/','HomeController@index')->name('home');
    
    route::get('/show-mhs','MahasiswaController@index')->name('show-mhs');
    Route::get('add-mhs','MahasiswaController@create')->name('add-mhs');
    Route::post('simpan-mhs','MahasiswaController@store')->name('simpan-mhs');
    Route::get('edit-mhs/{id}','MahasiswaController@show');
    Route::post('update-mhs/{id}','MahasiswaController@update');
    Route::get('hapus-mhs/{id}','MahasiswaController@destroy');



    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});


