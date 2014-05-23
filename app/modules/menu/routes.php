<?php 

Route::group(array('before' => 'auth'), function(){

	//Display list of menu
	Route::any('admin/menu', 'App\Modules\Menu\MenuController@indexAction');//->before('navigation_manage_permission');
	//display new menu form
	Route::any('admin/menu/create', 'App\Modules\Menu\MenuController@createAction');
	
});