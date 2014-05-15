<?php 
namespace App\Modules\Settings;

class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('settings');
	}

	public function boot()
	{
		parent::boot('settings');
	}
}