<?php 

class Taxonomy extends \Eloquent
{
	protected $table 		= 'term_taxonomy';
	protected $primaryKey 	= 'term_taxonomy_id';
	public $timestamps 		= false;

	public function terms()
	{
		return $this->hasMany('Terms');
	}

}