<?php 

class Terms extends \Eloquent
{
	protected $table 		= 'terms';
	protected $primaryKey 	= 'term_id';
	public $timestamps 		= false;

	public function taxonomy()
	{
		return $this->belongsTo('Taxonomy', 'term_id');
	}
	

	public function saveTerm( $input )
	{
		$terms = new \Terms;
		$terms->name 		= $input['name']; 
		$terms->slug 		= $input['slug'];
		$terms->term_group 	= 0;

		if($terms->save())
		{
			return $terms->term_id;
			
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Get Array terms by taxonomy
	 *
	 *@params taxonomy
	 *@return (Array|terms)
	 */
	 
	 
	public function getArrayTerms( $taxonomy = 'category') 
	{
		$resultSet = $this->getTermsByTaxonomy($taxonomy);
		$terms = array();
		if($resultSet)
		{
			foreach($resultSet as $key => $row)
			{
				$terms[$row->term_taxonomy_id] = $row->name;
			}
		}

		return $terms;

	}
	
	/**
	 * Get Object terms by taxonomy
	 *
	 *@params taxonomy
	 *@return (Object|terms)
	 */
	 
	public function getTermsByTaxonomy( $taxonomy  )
	{
		$resultSet	= \DB::table('terms')
						->leftJoin('term_taxonomy', 'terms.term_id', '=', 'term_taxonomy.term_id')
						->where('term_taxonomy.taxonomy', '=', $taxonomy)
						->select('term_taxonomy.term_taxonomy_id', 'terms.name')->remember(10)->get();
						
		return $resultSet;
	}
	
	/**
	 * Get array term_taxonomy_id of the post
	 *
	 *@params post_id
	 *@return (array|terms)
	 */
	
	public function getArrayPostTermTaxonomyId( $post_id )
	{
		$term_tax_ids = $this->getPostTermTaxonomyId($post_id);
		$arr_ids = array();
		foreach($term_tax_ids as $k => $term)
		{
			$arr_ids[] = $term->term_taxonomy_id;
		}
		
		return $arr_ids;
	}
	
	/**
	 * Get term_taxonomy_id of the post
	 *
	 *@params post_id
	 *@return (Object|terms)
	 */
	public function getPostTermTaxonomyId($post_id)
	{
		$terms = \DB::table('term_relationships')
			->select('term_taxonomy_id')
			->where('object_id', $post_id)->remember(10)->get();
			
		return $terms;
		
	}
}