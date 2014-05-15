<?php 

namespace App\Modules\Testimonial;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('testimonial');
	}

	public function boot()
	{
		parent::boot('testimonial');
	}
}