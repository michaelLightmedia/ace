<?php 

Route::group(array('before' => 'auth'), function(){

	Route::any('admin/banners', 'App\Modules\Banner\BannerController@indexAction');//->before('pages_manage_permission');

	Route::any('admin/banner/create', 'App\Modules\Banner\BannerController@createAction');//->before('pages_edit_permission');

	Route::any('admin/banner/{id}/edit', 'App\Modules\Banner\BannerController@editAction');//->before('pages_edit_permission');

	Route::any('admin/banner/delete', 'App\Modules\Banner\BannerController@deleteAction');//->before('pages_delete_permission');
});