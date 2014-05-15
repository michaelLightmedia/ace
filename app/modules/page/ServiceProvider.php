<?php 

namespace App\Modules\Page;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('page');
	}

	public function boot()
	{
		parent::boot('page');
	}
}