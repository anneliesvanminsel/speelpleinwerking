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
