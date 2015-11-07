<?php

//Routes for mobile API - Customer
Route::group([ 'prefix' => 'api/customer', 'namespace' => 'API\Customer'], function()
{
	/*
	prefix 	is for api/customer/{given_url}
	namespace is for creating folder in controllers folder (API\Customer)
	*/

	//Authintication
	Route::post('login',
	[
		'as' 	=> 'API.customer.login',
		'uses' 	=> 'AuthController@login'
	]);
	Route::post('logout',
	[
		'as' 	=> 'API.customer.logout',
		'uses' 	=> 'AuthController@logout'
	]);
	Route::post('register',
	[
		'as' 	=> 'API.customer.register',
		'uses' 	=> 'AuthController@register'
	]);
	//Authintication - END
	
	//List Showing
	Route::post('list_summary',
	[
		'as' 	=> 'API.customer.list_summary',
		'uses' 	=> 'ListShowingController@list_summary'
	]);
	Route::post('list_jobs',
	[
		'as' 	=> 'API.customer.list_jobs',
		'uses' 	=> 'ListShowingController@list_jobs'
	]);
	Route::post('payment_statements',
	[
		'as' 	=> 'API.customer.payment_statements',
		'uses' 	=> 'ListShowingController@payment_statements'
	]);
	//List Showing - END

	//Profile
	Route::post('profile_view',
	[
		'as' 	=> 'API.customer.profile_view',
		'uses' 	=> 'ProfileController@profile_view'
	]);
	Route::post('profile_update',
	[
		'as' 	=> 'API.customer.profile_update',
		'uses' 	=> 'ProfileController@profile_update'
	]);
	//Profile - END
});