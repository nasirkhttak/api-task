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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('userLogin', 'API\PassportController@login');
Route::post('userRegister', 'API\PassportController@register');

Route::group(['middleware' => 'Auth::api'], function(){
	Route::get('posts', 'PostController@index');
	Route::post('posts', 'PostController@store');
	Route::get('post/{id}', 'PostController@show');
	Route::post('post/{id}', 'PostController@update');
	Route::get('post/{id}', 'PostController@destroy');
});



