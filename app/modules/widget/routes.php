<?php 

Route::group(array('before' => 'auth'), function(){

	//Display list of widget
	Route::any('admin/widget', 'App\Modules\Widget\WidgetController@indexAction');//->before('navigation_manage_permission');
	//display new widget form
	Route::any('admin/widget/create', 'App\Modules\Widget\WidgetController@createAction');
	
});