<?php
//check if user has capability to manage blogs
Route::filter('blogs_manage_permission', function(){
	if(!Auth::User()->group->hasRole('manage_blogs'))App::abort(403);
});
//check if user has capability to create blogs
Route::filter('blogs_create_permission', function(){
	if(!Auth::User()->group->hasRole('create_blogs'))App::abort(403);
});

//check if user has capability to edit blogs
Route::filter('blogs_edit_permission', function(){
	if(!Auth::User()->group->hasRole('edit_blogs'))App::abort(403);
});

//check if user has capability to delete blogs
Route::filter('blogs_delete_permission', function( $id ){
	if(!Auth::User()->group->hasRole('delete_blogs'))App::abort(403);
});

//check if user has capability to delete blogs
Route::filter('blogs_delete_other_permission', function(){
	if(!Auth::User()->group->hasRole('delete_other_blogs'))App::abort(403);
});