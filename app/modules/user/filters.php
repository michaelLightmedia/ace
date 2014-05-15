<?php
//check if user has capability to manage users
Route::filter('users_manage_permission', function(){
	if(!Auth::User()->group->hasRole('manage_users'))App::abort(403);
});
//check if user has capability to create users
Route::filter('users_create_permission', function(){
	if(!Auth::User()->group->hasRole('add_users'))App::abort(403);
});

//check if user has capability to edit users
Route::filter('users_edit_permission', function(){
	if(!Auth::User()->group->hasRole('edit_users'))App::abort(403);
});

//check if user has capability to delete users
Route::filter('users_delete_permission', function( $id ){
	if(!Auth::User()->group->hasRole('delete_users'))App::abort(403);
});

//check if user has capability to delete users
Route::filter('users_delete_other_permission', function(){
	if(!Auth::User()->group->hasRole('delete_other_users'))App::abort(403);
});