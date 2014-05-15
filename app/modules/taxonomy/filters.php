<?php
//check if user has capability to manage categories
Route::filter('categories_manage_permission', function(){
	if(!Auth::User()->group->hasRole('manage_categories'))App::abort(403);
});
//check if user has capability to create categories
Route::filter('categories_create_permission', function(){
	if(!Auth::User()->group->hasRole('create_categories'))App::abort(403);
});

//check if user has capability to edit categories
Route::filter('categories_edit_permission', function(){
	if(!Auth::User()->group->hasRole('edit_categories'))App::abort(403);
});

//check if user has capability to delete categories
Route::filter('categories_delete_permission', function( $id ){
	if(!Auth::User()->group->hasRole('delete_categories'))App::abort(403);
});

//check if user has capability to delete categories
Route::filter('categories_delete_other_permission', function(){
	if(!Auth::User()->group->hasRole('delete_other_categories'))App::abort(403);
});