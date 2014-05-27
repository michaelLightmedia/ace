<?php 

namespace App\Modules\Policy;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('policy');
	}

	public function boot()
	{
		parent::boot('policy');
	}
}