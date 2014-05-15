<?php
namespace App\Modules\Orders;

class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('orders');
	}

	public function boot()
	{
		parent::boot('orders');
	}
}