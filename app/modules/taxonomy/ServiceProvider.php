<?php
namespace App\Modules\Taxonomy;

class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('taxonomy');
	}

	public function boot()
	{
		parent::boot('taxonomy');
	}
}