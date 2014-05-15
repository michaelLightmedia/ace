<?php
class PostMeta extends Eloquent
{
	protected $table = 'postmeta';
	protected $primaryKey = "meta_id";
	public $timestamps = false;

	public function ppost()
	{
		return $this->belongsTo('PPost');
	}
	
	public function deletePostmeta($post_id, $meta_key = false)
	{
		$query = PostMeta::where('post_id', '=', $post_id);
		if($meta_key)
		{
			$query = $query->where('meta_key', '=', $meta_key);
		}
		$affectedRows = $query->delete();
		
		return $affectedRows;
	}
	
	public function update_postmeta($post_id, $meta_key, $meta_value)
    {

    	if($post_id && $meta_key)
    	{	

    		$query = PostMeta::whereRaw("post_id = $post_id and meta_key = '$meta_key'");


	    	if(!$postmeta = $query->get()->toArray())
	    	{
	    		$postmeta = new PostMeta;

	    		$postmeta->post_id 		= $post_id;
		    	$postmeta->meta_key 	= $meta_key;
		    	$postmeta->meta_value 	= $meta_value;

	    		$affectedRows = $postmeta->save();
	    	}
	    	else
	    	{
	    		$affectedRows = $query->update(array('post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value));
	    	}

	    	if($affectedRows)
	    	{
	    		return array('status' => 'saved');
	    	}
	    	else
	    	{
	    		return array('status' => 'failed');
	    	}

    	}
    	else
    	{
    		return array('status' => 'failed');
    	}
    }


    public function getAllPostMeta( $post_id )
    {
    	$resultSet = \PostMeta::where('post_id', '=', $post_id)->get()->toArray();


    	return $resultSet;
    }

    //Deprecated soon
    public function getPostMeta( $post_id, $meta_key )
    {
    	$resultSet = \PostMeta::where('post_id', '=', $post_id)
    		->where('meta_key', '=', $meta_key)
    		->pluck('meta_value');

    	return $resultSet;
    }


    public static function getPostMetaValue( $meta_key, $post_id )
    {
    	$resultSet = \PostMeta::where('post_id', '=', $post_id)
    		->where('meta_key', '=', $meta_key)
    		->pluck('meta_value');



    	return $resultSet;
    }
}