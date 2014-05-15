<?php
class PostRecentlyViewed extends Eloquent
{

	protected $table = 'post_recently_viewed';
    public $timestamps = false;

    public static function logPostViewed( $post_id, $post_type )
    {
        //Save post to recently viewed table
        if( !$postRecentlyViewed = PostRecentlyViewed::where('post_id', $post_id)->where('user_id',Auth::User()->id )->first())
        {
            $postRecentlyViewed = new PostRecentlyViewed;
            $postRecentlyViewed->post_id = $post_id;
            $postRecentlyViewed->user_id = Auth::User()->id;
            $postRecentlyViewed->post_type = $post_type;
        }

        $postRecentlyViewed->date_viewed = date('Y-m-d H:i:s');
        return $postRecentlyViewed->save();
    }

    
    public static function getPostRecentlyViewed($user_id, $post_type)
    {

    	$ppost = self::where('user_id', $user_id)
    	->where('post_type', $post_type)
    	->groupby('post_id')
    	->orderby('date_viewed', 'desc')
    	->get();


    	
    	$recentlyViewed = array();

    	foreach($ppost as $item)
		{
			$arr = array();
			$post = PPost::find($item->post_id);

			$arr = $post->toArray();

			$metas = $post->postmeta;
			foreach($metas as $meta)
			{
				$arr[$meta['meta_key']] = $meta['meta_value'];
			}

			$title = $post->post_title;

			//Excerpt title
			$arr['post_excerpt_title'] = strlen($title) > 25 ?  substr($title, 0, 22).'...' : $title;
			//Get post content
			$content = strip_tags($post->post_content);
			//Get excerpt content
			$arr['excerpt'] 	= isset($post->excerpt) ? strip_tags($post->excerpt) : strlen($content > 50) ? substr($content, 0, 47).'...' : $content ;

			//Get featured media
			$arr['post-media'] = Gy::postFeatureMediaThumb($post::mediaAttachment($item->post_id, 'thumbnail'));
			
			$recentlyViewed[] = $arr;
		}

		return $recentlyViewed;
		
    }


    public static function getProductRecentlyViewed($user_id, $post_type)
    {
    	$posts = self::getPostRecentlyViewed($user_id, $post_type);
        $recent = array();
        if($posts)
        {
        
        	for($i = 0; $i < count($posts); $i++)
        	{
        		if($prod = PPost::find($posts[$i]['id'])->product)
        		{

                    if($prod['post_type'] == 'groupbuy' || $prod['post_type'] == 'event')
                    {
                        //check if item is sold out
                        $prod['isSoldOut'] = strtotime(date('Y-m-d')) > strtotime($prod['deal_end']) || $prod['quantity'] <= 0;
                    }
                    else
                    {
                        $prod['isSoldOut'] = $prod['quantity'] <= 0;    
                    }
                    
        			$recent[] = array_merge($posts[$i], $prod->toArray());


        		}
        	}
        }

    	return $recent;
    }
}