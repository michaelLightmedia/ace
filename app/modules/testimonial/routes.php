<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/testimonials', array(
		'as' 	=> 'admin.testimonials',
		'uses'	=> 'App\Modules\Testimonial\TestimonialController@indexAction'
		));//->before('testimonial_manage_permission');

	Route::any('admin/testimonial/create', array(
		'as' 	=> 'admin.testimonial.create',
		'uses'	=> 'App\Modules\Testimonial\TestimonialController@createAction'
		));//->before('testimonial_create_permission');

	Route::any('admin/testimonial/{id}/edit', array(
		'as' 	=> 'admin.testimonial.edit',
		'uses'	=> 'App\Modules\Testimonial\TestimonialController@editAction'
		));//->before('testimonial_edit_permission');


	Route::any('admin/testimonial/delete', array(
		'as' 	=> 'admin.testimonial.delete',
		'uses'	=> 'App\Modules\Testimonial\TestimonialController@deleteAction'
		));//->before('testimonial_delete_permission');
});