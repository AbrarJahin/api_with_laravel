<?php

Route::group(['namespace' => 'API'], function()
{
    Route::get('/',
	[
		'as' => 'API.index',
		'uses' => 'ListShowingController@add_votes' //API\
	]);
});