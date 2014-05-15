<?php
//check if user has capability to manage reporting
Route::filter('manage_orders_permission', function(){
	if(!Auth::User()->group->hasRole('manage_orders'))App::abort(403);
});
