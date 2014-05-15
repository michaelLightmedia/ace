<?php

//check if user has capability to manage settings
Route::filter('manage_tax_permission', function(){
	if(!Auth::User()->group->hasRole('manage_tax'))App::abort(403);
});