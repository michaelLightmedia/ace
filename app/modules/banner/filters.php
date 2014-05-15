<?php
//check if user has capability to manage pages
Route::filter('pages_manage_permission', function(){
	if(!Auth::User()->group->hasRole('manage_pages'))App::abort(403);
});
//check if user has capability to create pages
Route::filter('pages_create_permission', function(){
	if(!Auth::User()->group->hasRole('create_pages'))App::abort(403);
});

//check if user has capability to edit pages
Route::filter('pages_edit_permission', function(){
	if(!Auth::User()->group->hasRole('edit_pages'))App::abort(403);
});

//check if user has capability to delete pages
Route::filter('pages_delete_permission', function( $id ){
	if(!Auth::User()->group->hasRole('delete_pages'))App::abort(403);
});

//check if user has capability to delete pages
Route::filter('pages_delete_other_permission', function(){
	if(!Auth::User()->group->hasRole('delete_other_pages'))App::abort(403);
});