<?php
//check if user has capability to manage groupbuy
Route::filter('media_manage_permission', function(){
	if(!Auth::User()->group->hasRole('manage_media'))App::abort(403);
});
//check if user has capability to create groupbuy
Route::filter('media_create_permission', function(){
	if(!Auth::User()->group->hasRole('add_media'))App::abort(403);
});

//check if user has capability to edit groupbuy
Route::filter('media_edit_permission', function(){
	if(!Auth::User()->group->hasRole('edit_media'))App::abort(403);
});

//check if user has capability to delete groupbuy
Route::filter('media_delete_permission', function( $id ){
	if(!Auth::User()->group->hasRole('delete_media'))App::abort(403);
});

//check if user has capability to delete groupbuy
Route::filter('media_delete_other_permission', function(){
	if(!Auth::User()->group->hasRole('delete_other_media'))App::abort(403);
});