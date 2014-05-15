<?php

Route::group(array('before' => 'auth'), function(){

	//Index
	Route::get('admin/orders', 'App\Modules\Orders\OrdersController@indexAction')
		->before('manage_orders_permission');
	//Details
	Route::get('admin/order/{id}/details', 'App\Modules\Orders\OrdersController@detailsAction')
		->before('manage_orders_permission');

	Route::any('admin/orders/delete', 'App\Modules\Orders\OrdersController@deleteAction')
		->before('manage_orders_permission');

	Route::any('admin/order/order-status', 'App\Modules\Orders\OrdersController@statusChangeAction')
		->before('manage_orders_permission');

	Route::any('admin/order/payment-status', 'App\Modules\Orders\OrdersController@paymentStatusChangeAction')
		->before('manage_orders_permission');
});