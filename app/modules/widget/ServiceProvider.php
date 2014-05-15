<?php
namespace App\Modules\Widget;
class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('widget');
	}

	public function boot()
	{
		parent::boot('widget');
	}
}
