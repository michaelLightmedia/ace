<?php 
Route::group(array('before' => 'auth'), function(){
	//General Settings
	Route::get('admin/settings/general', 'App\Modules\Settings\SettingsController@getGeneral');//->before('manage_settings_permission');
	Route::post('admin/settings/general', 'App\Modules\Settings\SettingsController@postGeneral');//->before('manage_settings_permission');

	Route::get('admin/settings/trackings', 'App\Modules\Settings\SettingsController@getTracking');//->before('manage_settings_permission');
	Route::get('admin/settings/user-security', 'App\Modules\Settings\SettingsController@getUserSecurity');//->before('manage_settings_permission');
	Route::get('admin/settings/contact-info', 'App\Modules\Settings\SettingsController@getContactInfo');//->before('manage_settings_permission');

	//Payment Settings
	Route::any('admin/settings/user', 'App\Modules\Settings\SettingsController@userAction');//->before('manage_settings_permission');
	//Payment Settings
	Route::any('admin/settings/ask-expert', 'App\Modules\Settings\SettingsController@askExpertAction');//->before('manage_settings_permission');

	//Payment Settings
	Route::any('admin/settings/product', 'App\Modules\Settings\SettingsController@productAction');//->before('manage_settings_permission');

	//Loyalty Settings
	Route::any('admin/settings/loyalty-points', 'App\Modules\Settings\SettingsController@loyaltyAction');//->before('manage_settings_permission');

	//Delete referral Settings
	Route::any('admin/settings/loyalty-points/{id}/delete', 'App\Modules\Settings\SettingsController@deleteLoyaltyAction');//->before('manage_settings_permission');

	//Referral Settings
	Route::any('admin/settings/referral', 'App\Modules\Settings\SettingsController@referralAction');//->before('manage_settings_permission');
	//Delete referral Settings
	Route::any('admin/settings/referral/{id}/delete', 'App\Modules\Settings\SettingsController@deleteReferralAction');//->before('manage_settings_permission');


});