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

Route::get('/',['as'=>'home','uses' => 'PageController@home']);
Route::get('/login',['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('/logout',['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::get('/vault',['as' => 'vault', 'uses' => 'VaultController@index']);
Route::post('/loginvalidate',['as' => 'loginvalidate', 'uses' => 'AuthController@loginvalidate']);
Route::get('/forgot',['as' => 'forgot', 'uses' => 'AuthController@forgot']);
Route::get('/register',['as' => 'register', 'uses' => 'AuthController@register']);
Route::post('/registervalidate',['as' => 'registervalidate', 'uses' => 'AuthController@registervalidate']);
Route::get('/account',['as' => 'account', 'uses' => 'UserController@account']);
Route::get('/getuserdetails',['as'=>'getuserdetails','uses'=>'UserController@getuserdetails']);
Route::get('/page/{id}',['uses' => 'PageController@index']);
Route::get('/docview/{contacc}/{date}/{docid}',['uses' => 'VaultController@docview']);
Route::post('/savesettings',['as' => 'savesettings','uses' => 'UserController@savesettings']);
Route::get('/getdocuments',['as' => 'getdocuments','uses' => 'VaultController@getdocuments']);
Route::get('/datedocuments',['as' => 'datedocuments','uses' => 'VaultController@datedocs']);
Route::get('/payment',['as' => 'payment','uses'=>'PaymentController@payment']);
Route::post('/receipt',['as' => 'receipt','uses'=>'PaymentController@receipt']);

Route::group(['prefix'=>'api'],function(){
	Route::post('/login', ['uses'=>'ApiAuthController@login']);
	Route::get('/getuser',['uses' => 'ApiAuthController@getuser']);
	Route::get('/logout',['uses' => 'ApiAuthController@logout']);
	Route::get('/refresh',['uses' => 'ApiAuthController@refresh']);
	Route::post('/register',['uses' => 'ApiAuthController@register']);
	Route::get('/selectacc',['uses' => 'ApiAuthController@selectacc']);
	Route::get('/settings/password',['uses' => 'ApiUserController@password']);
	Route::get('/settings/name',['uses' => 'ApiUserController@name']);
	Route::get('/settings/email',['uses' => 'ApiUserController@email']);
	Route::get('/settings/contacc',['uses' => 'ApiUserController@contacc']);
	Route::get('/supply',['uses' => 'ApiPageController@supply']);
	Route::get('/meter',['uses' => 'ApiPageController@meter']);
	Route::get('/meterhistory',['uses' => 'ApiPageController@meterhist']);
	Route::get('/connection',['uses' => 'ApiPageController@connection']);
	Route::get('/reading',['uses' => 'ApiPageController@reading']);
	Route::get('/readinghistory',['uses' => 'ApiPageController@readinghist']);
	Route::get('/bill',['uses' => 'ApiPageController@bill']);
	Route::get('/payment',['uses' => 'ApiPageController@payment']);
	Route::get('/paymenthistory',['uses'=>'ApiPageController@paymenthist']);
	Route::get('/sixmonthpayment',['uses' => 'ApiPageController@sixmonthpayment']);
	Route::get('/paymentnotice',['uses' => 'ApiPageController@paymentnotice']);
	Route::get('/compliance',['uses' => 'ApiPageController@compliance']);
	Route::get('/care',['uses' => 'ApiPageController@care']);
	Route::get('/datedocuments',['uses'=>'ApiVaultController@datedocs']);
	Route::get('/getdocuments',['uses'=>'ApiVaultController@getdocs']);
	Route::get('/urldocuments',['uses'=>'ApiVaultController@urldocs']);

});

Route::group(['prefix'=>'admin'],function(){
	Route::get('/login',['as'=>'adminlogin','uses' => 'AdminController@login']);
	Route::post('/adminvalidate',['as'=>'adminvalidate','uses'=>'AdminController@adminvalidate']);
	Route::get('/dashboard',['uses'=>'AdminController@dashboard']);
	Route::get('/git',['uses'=>'AdminController@git']);
	Route::post('/gitupdate',['as'=>'gitupdate','uses'=>'AdminController@gitupdate']);
	Route::get('/composerupdate',['uses'=>'AdminController@composerupdate']);
	Route::get('/logout',['uses'=>'AdminController@logout']);
	Route::get('/pages',['uses'=>'AdminController@pages']);
	Route::get('/settings',['uses'=>'AdminController@settings']);
	Route::get('/images',['uses'=>'AdminController@images']);
	Route::post('/adminchangepwd',['as'=>'adminchangepwd','uses'=>'AdminController@adminchangepwd']);
	Route::post('/adduser',['as'=>'adduser','uses'=>'AdminController@adduser']);
	Route::get('/getsubcat',['uses'=>'AdminController@getsubcat']);
	Route::get('/getpage',['uses'=>'AdminController@getpage']);
	Route::get('/getcontent',['uses'=>'AdminController@getcontent']);
	Route::post('/savecontent',['uses'=>'AdminController@savecontent']);
});
