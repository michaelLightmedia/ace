<?php
//check if user has capability to manage reporting
Route::filter('manage_reporting_permission', function(){
	if(!Auth::User()->group->hasRole('manage_reporting'))App::abort(403);
});
