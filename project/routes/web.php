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

	Route::get('hoofdmonitoren', [
		'uses' => 'PageController@getHoofdmonitor',
		'as' => 'hoofdmonitoren'
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
	| Web Routes - Monitor / Volunteer
	|--------------------------------------------------------------------------
	*/

	Route::group(['prefix' => 'monitor'], function() {

		Route::get('create/{user_id}', [
			'uses' => 'MonitorController@getCreate',
			'as' => 'monitor.create'
		]);

		Route::post('create/{user_id}/post', [
			'uses' => 'MonitorController@postCreate',
			'as' => 'monitor.postCreate'
		]);

		//ADDRESS
		Route::group(['prefix' => 'adres'], function() {
			Route::get('create/{moni_id}', [
				'uses' => 'AddressController@getCreateMoni',
				'as' => 'monitor.createAddress'
			]);

			Route::post('create/{moni_id}/post', [
				'uses' => 'AddressController@postCreateMoni',
				'as' => 'monitor.postCreateAddress'
			]);
		});

		//GUARDIAN
		Route::group(['prefix' => 'voogd'], function() {
			Route::get('create/{moni_id}', [
				'uses' => 'ContactpersonController@getCreate',
				'as' => 'contact.create'
			]);

			Route::post('create/{moni_id}/post', [
				'uses' => 'ContactpersonController@postCreate',
				'as' => 'contact.postCreate'
			]);
		});

		//WEEK
		Route::group(['prefix' => 'week'], function() {
			Route::get('create/{moni_id}', [
				'uses' => 'MonitorController@getAddWeek',
				'as' => 'moni.addWeek'
			]);

			Route::post('create/{moni_id}/post', [
				'uses' => 'MonitorController@postAddWeek',
				'as' => 'moni.postAddWeek'
			]);

			Route::post('internship/{moni_id}/{week_id}/post', [
				'uses' => 'MonitorController@postInternship',
				'as' => 'monitor.internship'
			]);
		});
	});

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

			Route::get('days/{kid_id}', [
				'uses' => 'KidController@addDays',
				'as' => 'kid.addDays'
			]);

			Route::post('days/{kid_id}/post', [
				'uses' => 'KidController@postDays',
				'as' => 'kid.postDays'
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

		//SUMMER
		Route::group(['prefix' => 'zomer'], function() {
			Route::get('create', [
				'uses' => 'SummerController@getCreate',
				'as' => 'admin.newSummer'
			]);

			Route::post('create/post', [
				'uses' => 'SummerController@postCreate',
				'as' => 'admin.postNewSummer'
			]);

			//WEEK
			Route::group(['prefix' => 'week'], function() {
				Route::get('overzicht', [
					'uses' => 'SummerController@getWeeks',
					'as' => 'week.overview'
				]);

				Route::post('delete/{moni_id}/{week_id}', [
					'uses' => 'MonitorController@postDeleteWeek',
					'as' => 'monitor.postDeleteWeek'
				]);
			});

			//DAY
			Route::group(['prefix' => 'day'], function() {
				Route::get('overzicht', [
					'uses' => 'SummerController@getDays',
					'as' => 'day.overview'
				]);

				Route::post('delete/{kid_id}/{day_id}', [
					'uses' => 'KidController@postDeleteDay',
					'as' => 'kid.postDeleteDay'
				]);

				Route::post('attendance/{kid_id}/{day_id}/post', [
					'uses' => 'KidController@postAttendance',
					'as' => 'kid.attendance'
				]);

				Route::post('paid/{kid_id}/{day_id}/post', [
					'uses' => 'KidController@postPayment',
					'as' => 'kid.paid'
				]);
			});
		});

		//KID
		Route::group(['prefix' => 'kinderen'], function() {
			Route::get('overzicht', [
				'uses' => 'KidController@getOverview',
				'as' => 'kid.overview'
			]);

			Route::get('detail/{kid_id}', [
				'uses' => 'KidController@getDetail',
				'as' => 'kid.detail'
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

			Route::get('overzicht/zoek', [
				'uses' => 'KidController@search',
				'as' => 'kid.search'
			]);
		});

		//Volunteer
		Route::group(['prefix' => 'monitors'], function() {
			Route::get('overzicht', [
				'uses' => 'MonitorController@getOverview',
				'as' => 'monitor.overview'
			]);

			Route::get('overzicht/zoek', [
				'uses' => 'MonitorController@search',
				'as' => 'monitor.search'
			]);

			Route::get('detail/{moni_id}', [
				'uses' => 'MonitorController@getDetail',
				'as' => 'monitor.detail'
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

			Route::get('overzicht/zoek', [
				'uses' => 'FaqController@search',
				'as' => 'faq.search'
			]);
		});
	});
