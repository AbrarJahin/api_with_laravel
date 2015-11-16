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

	//Common Features
	Route::post('link_to_app',
	[
		'as' 	=> 'API.customer.link_to_app',
		'uses' 	=> 'CommonFeatureController@link_to_app'
	]);
	Route::post('reporting_issue_with_job',
	[
		'as' 	=> 'API.customer.reporting_issue_with_job',
		'uses' 	=> 'CommonFeatureController@reporting_issue_with_job'
	]);
	Route::post('training_videos',
	[
		'as' 	=> 'API.customer.training_videos',
		'uses' 	=> 'CommonFeatureController@training_videos'
	]);
	Route::post('how_can_we_help',
	[
		'as' 	=> 'API.customer.how_can_we_help',
		'uses' 	=> 'CommonFeatureController@how_can_we_help'
	]);
	Route::post('inviting_friends',
	[
		'as' 	=> 'API.customer.inviting_friends',
		'uses' 	=> 'CommonFeatureController@inviting_friends'
	]);
	//Common Features - END
});

//Routes for mobile API - Partner
Route::group([ 'prefix' => 'api/partner', 'namespace' => 'API\Partner'], function()
{
	/*
	prefix 	is for api/customer/{given_url}
	namespace is for creating folder in controllers folder (API\Customer)
	*/

	//Authintication
	Route::post('login',
	[
		'as' 	=> 'API.partner.login',
		'uses' 	=> 'AuthController@login'
	]);
	Route::post('logout',
	[
		'as' 	=> 'API.partner.logout',
		'uses' 	=> 'AuthController@logout'
	]);
	Route::post('register',
	[
		'as' 	=> 'API.partner.register',
		'uses' 	=> 'AuthController@register'
	]);
	//Authintication - END

	//Profile
	Route::post('profile_view',
	[
		'as' 	=> 'API.partner.profile_view',
		'uses' 	=> 'ProfileController@profile_view'
	]);
	Route::post('profile_update',
	[
		'as' 	=> 'API.partner.profile_update',
		'uses' 	=> 'ProfileController@profile_update'
	]);
	Route::post('upload_file',
	[
		'as' 	=> 'API.partner.upload_file',
		'uses' 	=> 'ProfileController@upload_file'
	]);
	Route::post('remove_file',
	[
		'as' 	=> 'API.partner.remove_file',
		'uses' 	=> 'ProfileController@remove_file'
	]);
	//Authintication - END
});