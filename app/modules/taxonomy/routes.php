<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/taxonomy/{taxonomy}',array(
		'as' 	=> 'admin.taxonomy.create',
		'uses'  => 'App\Modules\Taxonomy\TaxonomyController@createAction'
		));//->before('create_categories');

	Route::any('admin/taxonomy/{taxonomy}/{id}/edit',array(
		'as' 	=> 'admin.taxonomy.edit',
		'uses'  => 'App\Modules\Taxonomy\TaxonomyController@editAction'
		));//->before('categories_edit_permission');

	Route::post('admin/taxonomy/{taxonomy}/delete',array(
		'as' 	=> 'admin.taxonomy.taxonomy.delete',
		'uses'  => 'App\Modules\Taxonomy\TaxonomyController@deleteAction'
		));//->before('categories_delete_permission');



});