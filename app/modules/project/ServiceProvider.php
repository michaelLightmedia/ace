<?php 

namespace App\Modules\Project;

class ServiceProvider Extends \App\Modules\ServiceProvider
{

	public function register()
	{
		parent::register('project');
	}

	public function boot()
	{
		parent::boot('project');
	}
}