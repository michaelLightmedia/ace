<?php
namespace App\Modules\Reporting;

class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('reporting');
	}

	public function boot()
	{
		parent::boot('reporting');
	}
}