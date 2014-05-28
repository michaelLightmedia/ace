<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/policies', array(
		'as' 	=> 'admin.policies',
		'uses'	=> 'App\Modules\Policy\PolicyController@indexAction'
		));//->before('policy_manage_permission');

	Route::any('admin/policy/create', array(
		'as' 	=> 'admin.policy.create',
		'uses'	=> 'App\Modules\Policy\PolicyController@createAction'
		));//->before('policy_create_permission');

	Route::any('admin/policy/{id}/edit', array(
		'as' 	=> 'admin.policy.edit',
		'uses'	=> 'App\Modules\Policy\PolicyController@editAction'
		));//->before('policy_edit_permission');


	Route::any('admin/policy/delete', array(
		'as' 	=> 'admin.policy.delete',
		'uses'	=> 'App\Modules\Policy\PolicyController@deleteAction'
		));//->before('policy_delete_permission');
});