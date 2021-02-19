<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// route::get('data-subunit','SubunitController@index')->name('data-subunit');



Route::post('login-api','ApiLoginController@login')->name('login-api');
Route::post('registrasi','ApiUserController@store');

// Route::group(['middleware' => ['auth:api']], function () {
    
    // Route::get('user/data-rahasia', function () {
    //     return "Hay";
    // });

    // Route::apiResources([
    //     'kategoris' => 'API\KategoriController',        
    //     'pengguna' => 'API\PenggunaController',        
    //     'datakirim' => 'API\DatakirimController',        
    // ]);
// });



Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResources([
        'kategoris' => 'API\KategoriController',        
        'pengguna' => 'API\PenggunaController',        
        'datakirim' => 'API\DatakirimController',        
    ]);
// Route::get('datakirim','API\DatakirimController@tampildatakirim');
});

// // route::get('kategoris','HomeController@tampilkategori');
// route::get('teslah','HelloController@tes');
