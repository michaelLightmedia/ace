<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/people', array(
		'as' 	=> 'admin.people',
		'uses'	=> 'App\Modules\People\PeopleController@indexAction'
		));//->before('people_manage_permission');

	Route::any('admin/people/create', array(
		'as' 	=> 'admin.people.create',
		'uses'	=> 'App\Modules\People\PeopleController@createAction'
		));//->before('people_create_permission');

	Route::any('admin/people/{id}/edit', array(
		'as' 	=> 'admin.people.edit',
		'uses'	=> 'App\Modules\People\PeopleController@editAction'
		));//->before('people_edit_permission');


	Route::any('admin/people/delete', array(
		'as' 	=> 'admin.people.delete',
		'uses'	=> 'App\Modules\People\PeopleController@deleteAction'
		));//->before('people_delete_permission');
});