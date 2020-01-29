<?php

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/', [
		'uses' => 'PageController@getIndex',
		'as' => 'index'
	]);

	Route::get('index.php', [
		'uses' => 'PageController@getIndex',
		'as' => 'index'
	]);

	Route::get('hoofdleiding', [
		'uses' => 'PageController@getHoofdleiding',
		'as' => 'hoofdleiding'
	]);

	Route::get('cookiebeleid', [
		'uses' => 'PageController@getCookiebeleid',
		'as' => 'cookiebeleid'
	]);

	Route::get('privacybeleid', [
		'uses' => 'PageController@getPrivacybeleid',
		'as' => 'privacybeleid'
	]);

	Route::get('account/{user_id}', [
		'uses' => 'PageController@getAccount',
		'as' => 'account'
	]);

	Auth::routes();

	/*
	|--------------------------------------------------------------------------
	| Web Routes - Admin
	|--------------------------------------------------------------------------
	*/

	Route::group(['prefix' => 'admin'], function() {

		//admin routes
		Route::get('dashboard/{user_id}', [
			'uses' => 'PageController@getDashboard',
			'as' => 'admin.dashboard'
		]);

		//PLAYGROUPS
		Route::group(['prefix' => 'speelgroepen'], function() {
			Route::get('overzicht', [
				'uses' => 'PlaygroupController@getOverview',
				'as' => 'playgroup.overview'
			]);

			Route::get('create', [
				'uses' => 'PlaygroupController@getCreate',
				'as' => 'playgroup.create'
			]);

			Route::post('create/post', [
				'uses' => 'PlaygroupController@postCreate',
				'as' => 'playgroup.postCreate'
			]);
		});
	});
