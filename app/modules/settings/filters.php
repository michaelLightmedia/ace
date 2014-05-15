<?php

//check if user has capability to manage settings
Route::filter('manage_settings_permission', function(){
	if(!Auth::User()->group->hasRole('manage_settings'))App::abort(403);
});