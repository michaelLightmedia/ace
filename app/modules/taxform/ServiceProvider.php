<?php
namespace App\Modules\TaxForm;

class ServiceProvider extends \App\Modules\ServiceProvider
{
	public function register()
	{
		parent::register('taxform');
	}

	public function boot()
	{
		parent::boot('taxform');
	}
}