<?php


//check if user has capability to delete users
Route::filter('users_can_file_tax_form', function(){
    if(!Auth::User()->group->hasRole('can_file_tax_form'))App::abort(403);
});