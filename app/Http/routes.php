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
    return view('pages.index');
});
Route::get('/login',['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('/logout',['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::get('/vault',['as' => 'vault', 'uses' => 'VaultController@index']);
Route::post('/loginvalidate',['as' => 'loginvalidate', 'uses' => 'AuthController@loginvalidate']);
Route::get('/forgot',['as' => 'forgot', 'uses' => 'AuthController@forgot']);
Route::get('/register',['as' => 'register', 'uses' => 'AuthController@register']);
Route::post('/registervalidate',['as' => 'registervalidate', 'uses' => 'AuthController@registervalidate']);
Route::get('/account',['as' => 'account', 'uses' => 'UserController@account']);
Route::get('/page/{id}',['uses' => 'PageController@index']);
//Route::get('/test',['as' => 'test', 'uses' => 'PageController@test']);
Route::post('/savesettings',['as' => 'savesettings','uses' => 'UserController@savesettings']);

Route::group(['prefix'=>'api'],function(){
	Route::post('/login', ['uses'=>'ApiAuthController@login']);
	Route::get('/getuser',['uses' => 'ApiAuthController@getuser']);
	Route::get('/logout',['uses' => 'ApiAuthController@logout']);
	Route::get('/refresh',['uses' => 'ApiAuthController@refresh']);
	Route::post('/register',['uses' => 'ApiAuthController@register']);
	Route::get('/settings/password',['uses' => 'ApiUserController@password']);
	Route::get('/settings/name',['uses' => 'ApiUserController@name']);
	Route::get('/settings/email',['uses' => 'ApiUserController@email']);
	Route::get('/supply',['uses' => 'ApiPageController@supply']);
	Route::get('/meter',['uses' => 'ApiPageController@meter']);
	Route::get('/connection',['uses' => 'ApiPageController@connection']);
	Route::get('/reading',['uses' => 'ApiPageController@reading']);
	Route::get('/bill',['uses' => 'ApiPageController@bill']);
	Route::get('/payment',['uses' => 'ApiPageController@payment']);
	Route::get('/compliance',['uses' => 'ApiPageController@compliance']);
	Route::get('/care',['uses' => 'ApiPageController@care']);
});