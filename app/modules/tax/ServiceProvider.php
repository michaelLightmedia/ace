<?php 
namespace App\Modules\Tax;

class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('tax');
	}

	public function boot()
	{
		parent::boot('tax');
	}
}