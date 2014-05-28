<?php 

class Taxonomy extends \Eloquent
{
	protected $table 		= 'term_taxonomy';
	protected $primaryKey 	= 'term_taxonomy_id';
	public $timestamps 		= false;

	public function terms()
	{
		return $this->hasMany('Terms', 'term_id', 'term_taxonomy_id');
	}


	public function pposts() {
		return $this->belongsToMany('Taxonomy', 'term_relationships', 'object_id', 'term_taxonomy_id');
	}

}