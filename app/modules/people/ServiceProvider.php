<?php 

namespace App\Modules\People;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('people');
	}

	public function boot()
	{
		parent::boot('people');
	}
}