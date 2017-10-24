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

Route::group(['middleware' => ['cors', 'auth:api']], function () {

	Route::middleware('auth:api')->get('/user', function (Request $request) {

		return $request->user();

	});

	// api/inicio
	Route::resource('/album', 'Api\AlbumController');
	Route::resource('/galeria', 'Api\GaleriaController');

});



