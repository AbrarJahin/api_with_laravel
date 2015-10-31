<?php

Route::group(['namespace' => 'API'], function()
{
    Route::get('/',
	[
		'as' => 'API.index',
		'uses' => 'ListShowingController@list_summary'
	]);
});