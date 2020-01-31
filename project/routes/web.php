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

		//Kid
		Route::group(['prefix' => 'kinderen'], function() {
			Route::get('overzicht', [
				'uses' => 'KidController@getOverview',
				'as' => 'kid.overview'
			]);
		});

		//Volunteer
		Route::group(['prefix' => 'vrijwilligers'], function() {
			Route::get('overzicht', [
				'uses' => 'VolunteerController@getOverview',
				'as' => 'volunteer.overview'
			]);
		});

		//Families
		Route::group(['prefix' => 'families'], function() {
			Route::get('overzicht', [
				'uses' => 'FamilyController@getOverview',
				'as' => 'family.overview'
			]);
		});

		//SPONSORS
		Route::group(['prefix' => 'sponsors'], function() {
			Route::get('overzicht', [
				'uses' => 'SponsorController@getOverview',
				'as' => 'sponsor.overview'
			]);

			Route::get('create', [
				'uses' => 'SponsorController@getCreate',
				'as' => 'sponsor.create'
			]);

			Route::post('create/post', [
				'uses' => 'SponsorController@postCreate',
				'as' => 'sponsor.postCreate'
			]);

			Route::get('edit/{sponsor_id}', [
				'uses' => 'SponsorController@getEdit',
				'as' => 'sponsor.edit'
			]);

			Route::post('edit/{sponsor_id}/post', [
				'uses' => 'SponsorController@postEdit',
				'as' => 'sponsor.postEdit'
			]);

			Route::post('delete/{sponsor_id}/post', [
				'uses' => 'SponsorController@postDelete',
				'as' => 'sponsor.postDelete'
			]);
		});

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

			Route::get('edit/{playgroup_id}', [
				'uses' => 'PlaygroupController@getEdit',
				'as' => 'playgroup.edit'
			]);

			Route::post('edit/{playgroup_id}/post', [
				'uses' => 'PlaygroupController@postEdit',
				'as' => 'playgroup.postEdit'
			]);

			Route::post('delete/{playgroup_id}/post', [
				'uses' => 'PlaygroupController@postDelete',
				'as' => 'playgroup.postDelete'
			]);
		});

		//ACTIVITEITEN
		Route::group(['prefix' => 'activiteiten'], function() {
			Route::get('overzicht', [
				'uses' => 'ActivityController@getOverview',
				'as' => 'activity.overview'
			]);

			Route::get('create', [
				'uses' => 'ActivityController@getCreate',
				'as' => 'activity.create'
			]);

			Route::post('create/post', [
				'uses' => 'ActivityController@postCreate',
				'as' => 'activity.postCreate'
			]);

			Route::get('edit/{activity_id}', [
				'uses' => 'ActivityController@getEdit',
				'as' => 'activity.edit'
			]);

			Route::post('edit/{activity_id}/post', [
				'uses' => 'ActivityController@postEdit',
				'as' => 'activity.postEdit'
			]);

			Route::post('delete/{activity_id}/post', [
				'uses' => 'ActivityController@postDelete',
				'as' => 'activity.postDelete'
			]);
		});
	});
