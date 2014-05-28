<?php


class PPost extends Eloquent
{

	protected $table = 'posts';
	protected $primaryKey = 'id';
    public $timestamps = false;

    public function postmeta()
    {
    	return $this->hasMany('PostMeta', 'post_id');
    }

    public function comment()
    {
        return $this->hasMany('Comment', 'post_id');
    }

    public function taxonomy() {
        return $this->belongsToMany('PPost', 'term_relationships', 'term_taxonomy_id', 'object_id');
    }
    
    //Deprecated
    public function getAttachment($post_id, $size = false)
    {
        $postMeta = new PostMeta;

        $metadata = json_decode($postMeta->getPostMeta($post_id, 'attachment_metadata'));

      

        $attachment =& $metadata->sizes->thumbnail;

		
        if( $size )
        {
            $attachment =& $metadata->sizes->{"$size"};

            if(!$attachment) 
               $attachment =& $metadata->sizes->thumbnail; 
        }
        
            
        return URL::to('/').'/'.$attachment;
    }


    /** 
     * Get post featured media
     *@param post_id, size
     *@return video or image src
     */

    public static function mediaAttachment($post_id, $size = false)
    {


        $postMeta   = new PostMeta;

        //Get attachment type
        $type           = $postMeta->getPostMeta($post_id, 'attachment_type');
        $postAttachment   = $postMeta->getPostMeta($post_id, 'attachment');



        if( $type == 'url' )
        {
            
            return $postAttachment;
        }
        elseif ( $type == 'post' )
        {
            
            //Get media metadata
            $metadata   = json_decode($postMeta->getPostMeta($postAttachment, 'attachment_metadata'));
            $attachment =& $metadata->sizes->thumbnail;
           
            if( $size )
            {
                $attachment =& $metadata->sizes->{"$size"};

                if(!$attachment) 
                   $attachment =& $metadata->sizes->thumbnail; 
            }


            if($attachment)
            {

                return URL::to('/').'/'.$attachment;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
       
    }


    public function getPostRow($post_id)
    {
        $post = array();

        if($post = PPost::find($post_id))
        {
            $post = $post->toArray();
        }

        return $post;
    }
	
	
	
	
	public static function generateSlug($id, $slug)
    {
        $slug = \Str::slug($slug, '-');
        $flag = true;
        $indx = 0;

        while ( $flag == true )
        {

            $result = \PPost::where('guid', $slug)->where('id', '!=', $id);
            

            if( $result->count() == 0 )
            {
                $flag = false;
            }
            else
            {
                $slug   = $result->pluck('guid');

                $flag = true;

                $slugNo = substr(strrchr($slug, "-"), 1);

                if(preg_match('/^\d+$/',$slugNo)) 
                {
                  $indx = (int)$slugNo + 1;
                  $slug = str_replace($slugNo, $indx, $slug);
                } 
                else 
                {
                  $slug .= '-1';
                }
            }

        }
        return $slug;
    }

    public function savePost( $input )
    {

    	if(isset($input['id']))
    	{
			$id = $input['id'];
    		$post = PPost::find($id);
    	}
    	else
    	{
            $id     = 0;
    		$post   = new PPost;
    	}
        if(isset($input['post_title']))
        {
		  $post->post_title 		= $input['post_title'];
        }

        if(isset($input['post_content']))
        {
            $post->post_content     = $input['post_content'];    
        }
        if(isset($input['post_excerpt']))
        {
            $post->post_excerpt     =  $input['post_excerpt'];
        }
        if(isset($input['post_type']))
        {
            $post->post_type        =  $input['post_type'];
        }
        
        if(isset($input['comment_status']))
        {
            $post->comment_status   =  $input['comment_status'];
        }

        if( isset($input['post_parent']) )
        {
            $post->post_parent      =  $input['post_parent'];
        }
         
        if( isset($input['post_name']) )
        {
            $post->post_name        = $input['post_name'];
        }

        if(isset($input['post_mimetype']))
        {
            $post->post_mimetype = $input['post_mimetype'];
        }
        $slug = isset($input['slug']) ? $input['slug'] : $input['post_title'];


        $postSlug  = self::generateSlug($id, $slug);

        $post->post_date        = isset($input['post_date']) ? $input['post_date'] : date('Y-m-d H:i:s');
        $post->post_status      = isset($input['post_status']) ? $input['post_status'] : 'draft';
        if( $post->post_type != 'attachment' )
            $post->guid             = $postSlug;

		$post->author_id 		= Auth::User()->id;	
		$post->menu_order 		= isset($input['menu_order']) ? $input['menu_order'] : 0;
        $post->menu_level       = isset($input['menu_level']) ? $input['menu_level'] : 1;
		$post->updated_at 		= date('Y-m-d H:i:s');

		if( $post->save() )
		{

            $term_relationships = array();

            if(isset($input['term_taxonomy_id']))
            {
			
	           if(is_array($input['term_taxonomy_id']))
               {
                    foreach($input['term_taxonomy_id'] as $id)
                    {

                          $term_relationships[] = array(
                                  'object_id'      => $post->id,
                                  'term_taxonomy_id' => $id,
                                  'menu_order' => 0
                                );
                        
                    }

                }
                else
                {
                    $term_relationships[] = array(
                                  'object_id'      => $post->id,
                                  'term_taxonomy_id' => $input['term_taxonomy_id'],
                                  'menu_order' => 0
                                );
                }
				

                \DB::table('term_relationships')->where('object_id', $post->id)->delete();
                
                \DB::table('term_relationships')->insert($term_relationships);
            }

            

			return array('status' => 'saved', 'post' => $post);
		}

    	

    	return array('status' => 'failed', 'error_msg' => 'Invalid request method');
    }




    public static function getPostIdBySlug( $slug )
    {
        $postId = self::where('guid', $slug)->pluck('id');

        return $postId;
    }


   
 
}