<?php 
namespace App\Modules\Media;

class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('media');
	}

	public function boot()
	{
		parent::boot('media');
	}
}