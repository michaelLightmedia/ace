<?php

Route::group(array('before' => 'auth'), function(){

	//Overview
	Route::get('admin/reporting', 'App\Modules\Reporting\ReportingController@indexAction')
		->before('manage_reporting_permission');
	//Sales report
	Route::get('admin/sales-report', 'App\Modules\Reporting\ReportingController@salesAction')
		->before('manage_reporting_permission');
	//Orders report
	Route::any('admin/orders-report', 'App\Modules\Reporting\ReportingController@ordersAction')
		->before('manage_reporting_permission');
	//Member report
	Route::any('admin/members-report', 'App\Modules\Reporting\ReportingController@membersAction')
		->before('manage_reporting_permission');
});