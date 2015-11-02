<?php

//Routes for mobile API
Route::group(['prefix' => 'api/customer', 'namespace' => 'API\Customer', 'before' => 'auth.basic'], function()
{
	//prefix 	is for api/customer/{given_url}
	//namespace is for creating folder in controllers folder (API\Customer)
    Route::get('/',
	[
		'as' => 'API.index',
		'uses' => 'ListShowingController@dummy'
	]);
});