<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/comments', array(
		'as' 	=> 'admin.comments',
		'uses'	=> 'App\Modules\Comment\CommentController@indexAction'
		))->before('comment_manage_permission');

	Route::any('admin/comment/create', array(
		'as' 	=> 'admin.comment.create',
		'uses'	=> 'App\Modules\Comment\CommentController@createAction'
		))->before('comment_create_permission');

	Route::any('admin/comment/{id}/edit', array(
		'as' 	=> 'admin.comment.edit',
		'uses'	=> 'App\Modules\Comment\CommentController@editAction'
		))->before('comment_edit_permission');


	Route::any('admin/comment/delete', array(
		'as' 	=> 'admin.comment.delete',
		'uses'	=> 'App\Modules\Comment\CommentController@deleteAction'
		))->before('comment_delete_permission');
});