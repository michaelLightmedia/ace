<?php 

namespace App\Modules\Banner;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('banner');
	}

	public function boot()
	{
		parent::boot('banner');
	}
}