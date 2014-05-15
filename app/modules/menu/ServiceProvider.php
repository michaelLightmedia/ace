<?php
namespace App\Modules\Menu;
class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('menu');
	}

	public function boot()
	{
		parent::boot('menu');
	}
}
