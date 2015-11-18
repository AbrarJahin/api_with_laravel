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

	//List Showing
	Route::post('service_time_list',
	[
		'as' 	=> 'API.partner.service_time_list',
		'uses' 	=> 'ListDataController@service_time_list'
	]);
	Route::post('service_day_list',
	[
		'as' 	=> 'API.partner.service_day_list',
		'uses' 	=> 'ListDataController@service_day_list'
	]);
	//List Showing - END

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
	//Profile - END

	//ProfileCatorgized
	Route::post('partner_location_view',
	[
		'as' 	=> 'API.partner.partner_location_view',
		'uses' 	=> 'ProfileCatorgized@partner_location_view'
	]);
	Route::post('partner_location_insert',
	[
		'as' 	=> 'API.partner.partner_location_insert',
		'uses' 	=> 'ProfileCatorgized@partner_location_insert'
	]);
	Route::post('partner_location_remove',
	[
		'as' 	=> 'API.partner.partner_location_remove',
		'uses' 	=> 'ProfileCatorgized@partner_location_remove'
	]);
	Route::post('partner_experties_add',
	[
		'as' 	=> 'API.partner.partner_experties_add',
		'uses' 	=> 'ProfileCatorgized@partner_experties_add'
	]);
	Route::post('partner_experties_view',
	[
		'as' 	=> 'API.partner.partner_experties_view',
		'uses' 	=> 'ProfileCatorgized@partner_experties_view'
	]);
	Route::post('partner_experties_remove',
	[
		'as' 	=> 'API.partner.partner_experties_remove',
		'uses' 	=> 'ProfileCatorgized@partner_experties_remove'
	]);
	Route::post('partner_availiblity_add',
	[
		'as' 	=> 'API.partner.partner_availiblity_add',
		'uses' 	=> 'ProfileCatorgized@partner_availiblity_add'
	]);
	Route::post('partner_availiblity_view',
	[
		'as' 	=> 'API.partner.partner_availiblity_view',
		'uses' 	=> 'ProfileCatorgized@partner_availiblity_view'
	]);
	Route::post('partner_availiblity_delete',
	[
		'as' 	=> 'API.partner.partner_availiblity_delete',
		'uses' 	=> 'ProfileCatorgized@partner_availiblity_delete'
	]);

	Route::post('partner_owned_equipment_add',
	[
		'as' 	=> 'API.partner.partner_owned_equipment_add',
		'uses' 	=> 'ProfileCatorgized@partner_owned_equipment_add'
	]);
	Route::post('partner_owned_equipment_view',
	[
		'as' 	=> 'API.partner.partner_owned_equipment_view',
		'uses' 	=> 'ProfileCatorgized@partner_owned_equipment_view'
	]);
	Route::post('partner_owned_equipment_delete',
	[
		'as' 	=> 'API.partner.partner_owned_equipment_delete',
		'uses' 	=> 'ProfileCatorgized@partner_owned_equipment_delete'
	]);
	//ProfileCatorgized - END

	//Profile
	Route::post('open_work_orders_view',
	[
		'as' 	=> 'API.partner.open_work_orders_view',
		'uses' 	=> 'JobOrderMAnagementController@open_work_orders_view'
	]);
	//Profile - END
});