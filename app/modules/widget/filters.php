<?php
//check if user has capability to manage navigations
Route::filter('navigation_manage_permission', function(){
	if(!Auth::User()->group->hasRole('manage_navigation'))App::abort(403);
});
