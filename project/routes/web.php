<?php
	use App\Mail\MailtrapExample;
	use Illuminate\Support\Facades\Mail;

	Route::get('/send-mail', function () {

		Mail::to('newuser@example.com')->send(new MailtrapExample());

		return 'A message has been sent to Mailtrap!';

	});

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

		Route::get('edit/{monitor_id}', [
			'uses' => 'MonitorController@getEdit',
			'as' => 'monitor.edit'
		]);

		Route::post('edit/{monitor_id}/post', [
			'uses' => 'MonitorController@postEdit',
			'as' => 'monitor.postEdit'
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

			Route::get('edit/{address_id}', [
				'uses' => 'AddressController@getMoniEdit',
				'as' => 'monitor.editAddress'
			]);

			Route::post('edit/{address_id}/post', [
				'uses' => 'AddressController@postMoniEdit',
				'as' => 'monitor.postEditAddress'
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

			Route::get('edit/{contact_id}', [
				'uses' => 'ContactpersonController@getEdit',
				'as' => 'contact.edit'
			]);

			Route::post('edit/{contact_id}/post', [
				'uses' => 'ContactpersonController@postEdit',
				'as' => 'contact.postEdit'
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

			Route::get('edit/{address_id}', [
				'uses' => 'AddressController@getFamEdit',
				'as' => 'family.editAddress'
			]);

			Route::post('edit/{address_id}/post', [
				'uses' => 'AddressController@postFamEdit',
				'as' => 'family.postEditAddress'
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

			Route::get('edit/{guardian_id}', [
				'uses' => 'GuardianController@getEdit',
				'as' => 'guardian.edit'
			]);

			Route::post('edit/{guardian_id}/post', [
				'uses' => 'GuardianController@postEdit',
				'as' => 'guardian.postEdit'
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

			Route::get('edit/{kid_id}', [
				'uses' => 'KidController@getEdit',
				'as' => 'kid.edit'
			]);

			Route::post('edit/{kid_id}/post', [
				'uses' => 'KidController@postEdit',
				'as' => 'kid.postEdit'
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

		Route::post('searchKids/post', [
			'uses' => 'AdminController@postSearchKids',
			'as' => 'search.kidsOnDay'
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

			Route::post('detail/{kid_id}/delete-all-days', [
				'uses' => 'KidController@postDeleteAllDays',
				'as' => 'kid.deleteAllDays'
			]);

			Route::post('detail/{kid_id}/reset-is-active', [
				'uses' => 'KidController@postIsActive',
				'as' => 'kid.resetIsActive'
			]);

			Route::get('overzicht/zoek', [
				'uses' => 'KidController@search',
				'as' => 'kid.search'
			]);

		});

		//HOOFDLEIDING
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

			Route::get('create/{moni_id}', [
				'uses' => 'AdminController@getCreate',
				'as' => 'admin.create'
			]);

			Route::post('create/{moni_id}/post', [
				'uses' => 'AdminController@postCreate',
				'as' => 'admin.postCreate'
			]);

		});

		//MONITOR
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

		//FAMILY
		Route::group(['prefix' => 'families'], function() {
			Route::get('overzicht', [
				'uses' => 'FamilyController@getOverview',
				'as' => 'family.overview'
			]);

			Route::get('overzicht/zoek', [
				'uses' => 'FamilyController@search',
				'as' => 'family.search'
			]);

			Route::get('detail/{family_id}', [
				'uses' => 'FamilyController@getDetail',
				'as' => 'family.detail'
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
