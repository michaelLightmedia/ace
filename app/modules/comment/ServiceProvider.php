<?php 

namespace App\Modules\Comment;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('comment');
	}

	public function boot()
	{
		parent::boot('comment');
	}
}