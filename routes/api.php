<?php

use Illuminate\Http\Request;

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

Route::get('/album-clients', 'Api\AlbumController@index');
Route::get('/album-clients/{idalbum}', 'Api\AlbumController@show');
Route::post('/envio-email', 'Api\EnvioEmailController@store');

Route::group(['middleware' => ['cors', 'auth:api']], function () {

	Route::middleware('auth:api')->get('/user', function (Request $request) {

		return $request->user();

	});

	Route::resource('/site', 'Api\SiteController');

	Route::resource('/album', 'Api\AlbumController');

	Route::delete('/album/{idalbum}, Api\AlbumController@destroy');

	Route::resource('/galeria', 'Api\GaleriaController');

	Route::delete('/galeria/{idalbum}/{idimagem}', 'Api\GaleriaController@destroy');

});

//http://localhost:8000/storage/path -> caminho para as imagens

