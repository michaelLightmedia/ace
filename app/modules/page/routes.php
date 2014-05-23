<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/pages', array(
		'as' 	=> 'admin.pages',
		'uses'	=> 'App\Modules\Page\PageController@indexAction'
		));//->before('pages_manage_permission');

	Route::any('admin/page/create', array(
		'as' 	=> 'admin.page.create',
		'uses'	=> 'App\Modules\Page\PageController@createAction'
		));//->before('pages_edit_permission');

	Route::any('admin/page/{id}/edit', array(
		'as' 	=> 'admin.page.edit',
		'uses'	=> 'App\Modules\Page\PageController@editAction'
		));//->before('pages_edit_permission');


	Route::any('admin/page/delete', array(
		'as' 	=> 'admin.page.delete',
		'uses'	=> 'App\Modules\Page\PageController@deleteAction'
		));//->before('pages_delete_permission');
});