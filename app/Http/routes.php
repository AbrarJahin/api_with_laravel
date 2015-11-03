<?php

//Routes for mobile API
Route::group([ 'prefix' => 'api/customer', 'namespace' => 'API\Customer'], function()
{
	/*
	prefix 	is for api/customer/{given_url}
	namespace is for creating folder in controllers folder (API\Customer)
	*/

	Route::get('/',
	[
		'as' => 'API.customer.index',
		'uses' => 'ListShowingController@dummy'
	]);

	//Authintication
	Route::post('login',
	[
		'as' => 'API.customer.login',
		'uses' => 'AuthController@login'
	]);

	Route::delete('logout',
	[
		'as' => 'API.customer.logout',
		'uses' => 'AuthController@logout'
	]);

	Route::put('register',
	[
		'as' => 'API.customer.register',
		'uses' => 'AuthController@register'
	]);
	//Authintication - END
	
});