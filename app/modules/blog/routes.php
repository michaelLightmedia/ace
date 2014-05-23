<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/blogs', array(
		'as' 	=> 'admin.blogs',
		'uses'	=> 'App\Modules\Blog\BlogController@indexAction'
		));//->before('blog_manage_permission');

	Route::any('admin/blog/create', array(
		'as' 	=> 'admin.blog.create',
		'uses'	=> 'App\Modules\Blog\BlogController@createAction'
		));//->before('blog_create_permission');

	Route::any('admin/blog/{id}/edit', array(
		'as' 	=> 'admin.blog.edit',
		'uses'	=> 'App\Modules\Blog\BlogController@editAction'
		));//->before('blog_edit_permission');


	Route::any('admin/blog/delete', array(
		'as' 	=> 'admin.blog.delete',
		'uses'	=> 'App\Modules\Blog\BlogController@deleteAction'
		));//->before('blog_delete_permission');
});