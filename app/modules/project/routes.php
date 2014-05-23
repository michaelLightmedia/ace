<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/projects', array(
		'uses'	=> 'App\Modules\Project\ProjectController@indexAction'
		));//->before('project_manage_permission');

	Route::any('admin/project/create', array(
		'uses'	=> 'App\Modules\Project\ProjectController@createAction'
		));//->before('project_create_permission');

	Route::any('admin/project/{id}/edit', array(
		'uses'	=> 'App\Modules\Project\ProjectController@editAction'
		));//->before('project_edit_permission');


	Route::any('admin/project/delete', array(
		'uses'	=> 'App\Modules\Project\ProjectController@deleteAction'
		));//->before('project_delete_permission');
});