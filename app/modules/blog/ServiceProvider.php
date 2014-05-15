<?php 

namespace App\Modules\Blog;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('blog');
	}

	public function boot()
	{
		parent::boot('blog');
	}
}