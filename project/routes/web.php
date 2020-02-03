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

	Route::get('monitor', [
		'uses' => 'PageController@getMonitorInformation',
		'as' => 'monitor'
	]);

	Route::get('familie', [
		'uses' => 'PageController@getFamilyInformation',
		'as' => 'family'
	]);

	Auth::routes();

	/*
	|--------------------------------------------------------------------------
	| Web Routes - Family
	|--------------------------------------------------------------------------
	*/

	Route::group(['prefix' => 'familie'], function() {

		//ADDRESS
		Route::group(['prefix' => 'adres'], function() {
			Route::get('create', [
				'uses' => 'AddressController@getCreateFamily',
				'as' => 'family.createAddress'
			]);

			Route::post('create/post', [
				'uses' => 'AddressController@postCreateFamily',
				'as' => 'family.postCreateAddress'
			]);
		});

		//GUARDIAN
		Route::group(['prefix' => 'voogd'], function() {
			Route::get('create/{family_id}', [
				'uses' => 'GuardianController@getCreate',
				'as' => 'guardian.create'
			]);

			Route::post('create/{family_id}/post', [
				'uses' => 'GuardianController@postCreate',
				'as' => 'guardian.postCreate'
			]);
		});

		//KID
		Route::group(['prefix' => 'kind'], function() {
			Route::get('create/{family_id}', [
				'uses' => 'KidController@getCreate',
				'as' => 'kid.create'
			]);

			Route::post('create/{family_id}/post', [
				'uses' => 'KidController@postCreate',
				'as' => 'kid.postCreate'
			]);
		});

	});

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
		//Families
		Route::group(['prefix' => 'hoofdleiding'], function() {
			Route::get('huidig-overzicht', [
				'uses' => 'AdminController@getCurrentAdmins',
				'as' => 'admin.current-overview'
			]);

			Route::get('oud-overzicht', [
				'uses' => 'AdminController@getOldAdmins',
				'as' => 'admin.old-overview'
			]);
		});

		//Volunteer
		Route::group(['prefix' => 'monitors'], function() {
			Route::get('overzicht', [
				'uses' => 'MonitorController@getOverview',
				'as' => 'monitor.overview'
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

		//FAQ
		Route::group(['prefix' => 'faq'], function() {
			Route::get('overzicht', [
				'uses' => 'FaqController@getOverview',
				'as' => 'faq.overview'
			]);

			Route::get('create', [
				'uses' => 'FaqController@getCreate',
				'as' => 'faq.create'
			]);

			Route::post('create/post', [
				'uses' => 'FaqController@postCreate',
				'as' => 'faq.postCreate'
			]);

			Route::get('edit/{faq_id}', [
				'uses' => 'FaqController@getEdit',
				'as' => 'faq.edit'
			]);

			Route::post('edit/{faq_id}/post', [
				'uses' => 'FaqController@postEdit',
				'as' => 'faq.postEdit'
			]);

			Route::post('delete/{faq_id}/post', [
				'uses' => 'FaqController@postDelete',
				'as' => 'faq.postDelete'
			]);
		});
	});
