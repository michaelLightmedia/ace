<?php

class Site
{	


	public static function getPageTemplate()
	{

		$template = array();

		foreach(glob("app/views/templates/*.blade.php") as $filename)
		{
	     	$t = basename($filename, ".blade.php");
	     	$template[$t] = $t;
	 	}

	 	return $template;
	}


	/**
	 * Get page title
	 *
	 * @param  none
	 * @return string $title page title
	 */

	public static function title()
	{

		$current = URL::current();

	    $segments = explode ('/', $current);
//        echo "<tt><pre>" . var_export($segments, true) . "</pre></tt>";
//        die();
	    $meta_desc = '';
	    foreach ($segments as $key => $value) {
	        if($key >= 3 )
	        	$meta_desc .= PostMeta::getPostMetaValue('page_title',PPost::getPostIdBySlug($value));

	    }
	    
	    if(trim($meta_desc) != '')
	    	return $meta_desc;
	    else
	    	return Settings::get('site_page_title').' | '.Settings::get('site_meta_desc');

		//return $pageTitle;
	}

	public static function metaDescription()
	{

		$current = URL::current();
	    $segments = explode ('/', $current);
	    $meta_desc = '';
	    foreach ($segments as $key => $value) {
	        if($key >= 3 )
	        	$meta_desc .= PostMeta::getPostMetaValue('page_meta_description',PPost::getPostIdBySlug($value));
	    }
	    
	    if(trim($meta_desc) != '')
	    	return $meta_desc;
	    else
			return Settings::get('site_meta_desc');
	}

	/**
	 * Display the difference between two dates
	 * (30 years, 9 months, 25 days, 21 hours, 33 minutes, 3 seconds)
	 *
	 * @param  string $start starting date
	 * @param  string $end=false ending date
	 * @return string formatted date difference
	 */
	public static function dateDiff($start,$end=false)
	{
	   $return = array();
	   
	   try {
	      $start = new DateTime($start);
	      $end = new DateTime($end);
	      $form = $start->diff($end);
	   } catch (Exception $e){
	      return $e->getMessage();
	   }
	   
	   $display = array('y', 'm', 'd', 'h', 'i', 's');
	   foreach($display as $key){
	      //if($form->$key > 0){
	         $return[$key] = $form->$key;
	      //}
	   }
	   
	   return $return;
	}


	public static function setTimeZone( $timezone ) { 

		$zonelist = array(
			'Kwajalein' => -12.00, 
			'Pacific/Midway' => -11.00, 
			'Pacific/Honolulu' => -10.00, 
			'America/Anchorage' => -9.00, 
			'America/Los_Angeles' => -8.00, 
			'America/Denver' => -7.00, 
			'America/Tegucigalpa' => -6.00, 
			'America/New_York' => -5.00, 
			'America/Caracas' => -4.30, 
			'America/Halifax' => -4.00, 
			'America/St_Johns' => -3.30, 
			'America/Argentina/Buenos_Aires' => -3.00, 
			'America/Sao_Paulo' => -3.00, 
			'Atlantic/South_Georgia' => -2.00, 
			'Atlantic/Azores' => -1.00, 
			'Europe/Dublin' => 0, 
			'Europe/Belgrade' => 1.00, 
			'Europe/Minsk' => 2.00, 
			'Asia/Kuwait' => 3.00, 
			'Asia/Tehran' => 3.30, 
			'Asia/Muscat' => 4.00, 
			'Asia/Yekaterinburg' => 5.00, 
			'Asia/Kolkata' => 5.30, 
			'Asia/Katmandu' => 5.45, 
			'Asia/Dhaka' => 6.00, 
			'Asia/Rangoon' => 6.30, 
			'Asia/Krasnoyarsk' => 7.00, 
			'Asia/Brunei' => 8.00, 
			'Asia/Seoul' => 9.00, 
			'Australia/Darwin' => 9.30,
			'Australia/Canberra' => 10.00, 
			'Asia/Magadan' => 11.00, 
			'Pacific/Fiji' => 12.00, 
			'Pacific/Tongatapu' => 13.00);

        $index = array_keys($zonelist, $timezone );

        date_default_timezone_set($index[0]);

	 //   	$timezone = preg_replace('/[^0-9]/', '', $timezone) * 36;

		// $timezone_name = timezone_name_from_abbr(null, $timezone, true);


		// date_default_timezone_set($timezone_name);
		
	}  


	/**
	 * Display sytem message
	 * @param none
	 * @return none
	 */

	public static function system_messages($message_prefix = false)
	{
        ?>

        <?php
        $message_prefix = $message_prefix ? $message_prefix . "_" : "";

		//Display single success message
		if(Session::has($message_prefix . 'success_msg')): ?>
			<div class="alert alert-small alert-success fade in">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <i class="fa fa-check mr-5px"></i>
               	<?php echo Session::get($message_prefix . 'success_msg'); ?>
            </div>
		<?php endif;

		//Display modal message
		if (Session::has($message_prefix . 'modal_msg')): ?>
			<noscript>
	            <div class="alert alert-small alert-danger fade in">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <i class="fa fa-info-circle"></i>
	               	<?php 
	               	$modalMessage = Session::get($message_prefix . 'modal_msg');
	               	print_r($modalMessage[$message_prefix . 'message']); ?>
	            </div>
	    	</noscript>
	    	<script>
	    		$(function(){
	    			bootbox.dialog({
					  message: '<?php echo $modalMessage["message"]; ?>',
					  title: '<?php echo $modalMessage["title"]; ?>'
					});
					
	    			$('.modal').addClass('modal--skin-dark');
	    		});</script>

		<?php endif; 
		//display error message
		if (Session::has($message_prefix . 'error_msg')): ?>
            <div class="alert alert-small alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-info-circle"></i>
               	<?php print_r(Session::get($message_prefix . 'error_msg')); ?>
            </div>
		<?php endif;
        ?>
		<div id="validator_message"></div>
<?php
	}


	public static function getPostforOrder( $post_type )
    {
        $order = PPost::where('post_type', $post_type)->lists('post_title');
  
        return $order;
    }

	/**
	 * Banner
	 *@param banner category
	 *@return BOOL
	 */

	public static function getBanner($category)
	{
		$resultSet = DB::table('posts')
		->leftJoin('term_relationships', 'posts.id', '=', 'term_relationships.object_id')
		->leftJoin('term_taxonomy', 'term_taxonomy.term_taxonomy_id', '=', 'term_relationships.term_taxonomy_id')
		->leftJoin('terms', 'terms.term_id', '=', 'term_taxonomy.term_id')
		->where('posts.post_status', 'publish')
		->where('terms.name', $category)
		->select('posts.id','posts.post_title','posts.post_content', 'posts.post_excerpt')
		->orderby('posts.menu_order', 'asc')
		->get();

		$banners = array();

		$p = new \PPost;

		foreach($resultSet as $item)
		{
			$content = $item->post_content;
			$arr = array(
				'title' 	=> $item->post_title,
				'content'	=> strlen($content) > 100 ? substr($content, 0, 97).'...' : $content,
				'excerpt'	=> $item->post_excerpt
			);

			$metas = PPost::find($item->id)->postmeta->toArray();
			$meta = array();
			foreach($metas as $row)
	    	{
	    		$meta[$row['meta_key']] = $row['meta_value'];
	    	}

    		$meta['image'] = \Site::postFeatureMediaThumb($p->mediaAttachment($item->id, 'large'), 'thumbnail_large');


			$arr = array_merge($arr, $meta);

			$banners[] = $arr;
		}

		return $banners;
	}

	/**
	 * Format number add comma and dot
	 *@param number
	 *@return formatted number
	 */

	public static function formatNumber($number)
	{
		return number_format($number, 2, '.', ',');
	}

	/**
	 * Convert string to slug
	 *@param string
	 *@return formatted string
	 */
	public static function cleanSlug( $slug )
	{
		//Str::slug
		return preg_replace('/[^A-Za-z0-9-_]/', '', strtolower(str_replace(' ', '-', $slug)));

	}

	public static function getPostComment($post_id)
	{
		$prefix = DB::getTablePrefix();

		$query = "SELECT 
			a.*, 
			concat(b.firstname,' ',b.lastname) as author 
		FROM 
			".$prefix."posts_comments as a 
		left join 
			".$prefix."users as b ON a.user_id = b.id
		WHERE a.post_id = $post_id";


		$comments = \DB::select($query);

		 return $comments;
	}

	public static function arrayCastRecursive($array)
	{
	    if (is_array($array)) {
	        foreach ($array as $key => $value) {
//	            if (is_array($value)) {
//	                $array[$key] = $this->arrayCastRecursive($value);
//	            }
//	            if ($value instanceof stdClass) {
//	                $array[$key] = $this->arrayCastRecursive((array)$value);
//	            }
	        }
	    }
	    if ($array instanceof stdClass) {
	        return (array)$array;
	    }
	    return $array;
	}

	public function checkURL()
	{
		// check if string ends with image extension
		if (preg_match('/(\.jpg|\.png|\.bmp)$/', $content)) {
		    return "image";
		// check if there is youtube.com in string
		} elseif (strpos($content, "youtube.com") !== false) {
		    return "youtube";
		// check if there is vimeo.com in string
		} elseif (strpos($content, "vimeo.com") !== false) {
		    return "vimeo";
		} else {
		    return "text";
		}
	}

	public static function postSlug( $url )
	{
    	$url = explode('/', $url);

    	return $url[count($url) - 1];
	}
	
	/**
	 *
	 *
	 *@param multi_array, array
	 *@return array
	 */
	public static function multiToSingleArr($mul, $arr)
	{

		foreach($mul as $k => $v)
		{
			if(is_array($v))
			{
				self::multiToSingleArr($v, $arr);
			}
			$arr[$k] = $v;
		}
		
		return $arr;
	}


	/**
	 * build multi level navigation
	 *
	 * @param parent_id(int)
	 * @return none
	 */
	public static function multi_level_nav($level = 0) 
	{

		$tblPrefix = DB::getTablePrefix();

		$sql = "SELECT * FROM ".$tblPrefix."posts WHERE post_type= ? and post_parent = ?";
		$resultSet =  DB::select($sql, array('nav_menu_item',$level)); 

		if($resultSet)	
		{
			foreach($resultSet as $item)
			{
				echo '<option value="'.$item->id.'">'.str_repeat('- ', $item->menu_level). $item->post_title.'</option>';
				$hasChild =  DB::select($sql, array('nav_menu_item',$item->post_parent));
				if($hasChild) 
				{
					self::multi_level_nav($item->id);
				}
			}
		}

	}

	/**
	 * add http:// to url if not exists
	 *
	 *@param url(string)
	 *@return formatted url(string)
	 */

	public static function addhttp($url) {
	    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
	        $url = "http://" . $url;
	    }
	    return $url;
	}


	public static function gy_widget( $arr = array() )
	{
		extract($arr);

		$default = array(
			'showTitle' => isset($showTitle) ? $showTitle : null,
			'widget'		=> isset($widget) ? $widget : null,
		);

		extract($default);

		$resultSet = DB::table('posts')
		->leftJoin('term_relationships', 'posts.id', '=', 'term_relationships.object_id')
		->leftJoin('term_taxonomy', 'term_taxonomy.term_taxonomy_id', '=', 'term_relationships.term_taxonomy_id')
		->leftJoin('terms', 'terms.term_id', '=', 'term_taxonomy.term_id')
		->where('posts.post_type', 'widget_item')
		->where('terms.name', $widget)
		->select('posts.id','posts.post_title','posts.post_content')
		->orderby('posts.menu_order', 'asc')
		->get();

		if($resultSet)
		{
			foreach($resultSet as $k => $result)
			{
				echo '<div class="container">';
				if( $showTitle )
					echo '<h3>'.$result->post_title.'</h3>';

				echo $result->post_content;
				echo '</div>';
			}
		}


	}


	/**
	 * Theme navigation
	 *@param user_id, points
	 *@return BOOL
	 */
	public static function gy_nav_menu( $arr = array() )
	{
		extract($arr);

		$default = array(
			'level' 	=> isset($level) ? $level : 0,
			'menu'		=> isset($menu) ? $menu : null,
			'menu_id'	=> isset($menu_id) ? $menu_id : null,
			'menu_class' => isset($menu_class) ? $menu_class : null,
		);

		extract($default);

		$resultSet = DB::table('posts')
		->leftJoin('term_relationships', 'posts.id', '=', 'term_relationships.object_id')
		->leftJoin('term_taxonomy', 'term_taxonomy.term_taxonomy_id', '=', 'term_relationships.term_taxonomy_id')
		->leftJoin('terms', 'terms.term_id', '=', 'term_taxonomy.term_id')
		->where('posts.post_type', 'nav_menu_item')
		->where('posts.post_parent', $level)
		->where('terms.name', $menu)
		->select('posts.id','posts.post_title','posts.guid', 'posts.post_parent')
		->orderby('posts.menu_order', 'asc')
		->get();

		if($resultSet)
		{
			echo sprintf('<ul id="%s" class="%s">', $menu_id, $menu_class);
				foreach($resultSet as $item)
				{

					$post = PPost::find($item->id);
					$meta_arr = $post->postmeta->toArray();

	                $meta = array();
	                foreach($meta_arr as $arr )
	                {
	                	$meta[$arr['meta_key']] = $arr['meta_value'];
	                }
	                $item_type 		= $meta['_menu_item_type'];
	                $item_obj 		= $meta['_menu_item_object'];
	                $item_obj_id 	= $meta['_menu_item_object_id'];
	                $item_target  	= isset($meta['_menu_item_target']) ? $meta['_menu_item_target']: 0;
	                $is_new_window  = $item_target ? '_blank' : '_parent';
	                $item_url  		= $meta['_menu_item_url'] == '#' ? $meta['_menu_item_url'] : self::addhttp($meta['_menu_item_url']);
	                $item_classes 	= isset($meta['_menu_item_classes']) ? @unserialize($meta['_menu_item_classes']) : null;

	                $menu_item = ($item_type == 'post') ? $post->getPostRow($item_obj_id) : null;
	                
	               	$item_url = $item_type == 'custom' ? $item_url : URL::to($menu_item['guid']);

	                $title = (empty($item->post_title) && isset($menu_item['post_title'])) ? $menu_item['post_title'] : $item->post_title;

					echo sprintf('<li class="%s">', $item_classes);
					echo sprintf('<a href="%s" target="%s">', $item_url, $is_new_window);
					echo $item->post_title;
					echo '</a>';

					$hasChild = PPost::where('post_type', 'nav_menu_item')
					->where('post_parent', $item->post_parent)
					->orderBy('menu_order', 'asc')
					->first();

					if($hasChild)
					{
						$default = array(
							'level' 	=> $item->id,
							'menu'		=> isset($menu) ? $menu : null,
						);

						self::gy_nav_menu($default);
					}


					echo '</li>';
				}
			echo '</ul>';
		}

	}

	/**
	 * Admin widget
	 *@param level, widget
	 *@return BOOL
	 */	
	public static function widgets( $level = 0, $widget)
	{	
		$tblPrefix = DB::getTablePrefix();

		$sql = "SELECT * FROM ".$tblPrefix."posts p 
		LEFT JOIN ".$tblPrefix."term_relationships t ON p.id = t.object_id 
		WHERE p.post_type= ? and p.post_parent = ? and t.term_taxonomy_id = ? order by p.menu_order";
		$resultSet =  DB::select($sql, array('widget_item',$level, $widget)); 

		if($resultSet)	
		{

			echo '<ol class="dd-list">';
			foreach($resultSet as $item)
			{	
				
				$post 		= PPost::find($item->id);
				$meta_arr = $post->postmeta->toArray();

                $meta = array();
                foreach($meta_arr as $arr )
                {
                	$meta[$arr['meta_key']] = $arr['meta_value'];
                }
                $item_type 		= isset( $meta['_widget_item_type'] ) ? $meta['_widget_item_type'] : null ;
                $item_obj 		= isset( $meta['_widget_item_object'] ) ? $meta['_widget_item_object'] : null ;
                $item_obj_id 	= isset( $meta['_widget_item_object_id'] ) ? $meta['_widget_item_object_id'] : null;
                $item_target  	= isset($meta['_widget_item_target']) ? $meta['_widget_item_target']: 0;
                $is_new_window  = $item_target ? 'checked' : null;
                //$item_url  		= $meta['_widget_item_url'] != '#' && $meta['_widget_item_url'] != '' ? self::addhttp($meta['_widget_item_url']) : '#';
                $item_classes 	= isset($meta['_widget_item_classes']) ? @unserialize($meta['_widget_item_classes']) : null;
                $item_classes 	= $item_classes;


                $widget_item = ($item_type == 'post') ? $post->getPostRow($item_obj_id) : null;

                $title = (empty($item->post_title) && isset($widget_item['post_title'])) ? $widget_item['post_title'] : $item->post_title;
        		$title = htmlentities($title);
                $excrpt_title = strlen($title) > 100 ? substr($title, 0, 97).'...' : $title;

                $status = $item->post_status == 'draft' ? ' <span class="label label-danger">Pending</span>' : null;

				echo '<li class="dd-item js-menu-item" data-id="'.$item->id.'">'.
						'<input type="hidden" name="widget-item['.$item->id.'][_widget_item_id]" value="'.$item->id.'"/>'.
						'<input type="hidden" id="widget-item-parent-'.$item->id.'" name="widget-item['.$item->id.'][_widget_item_parent]" value="'.$item->post_parent.'"/>'.
						'<input type="hidden" name="widget-item['.$item->id.'][_widget_item_level]" value="'.$item->menu_level.'"/>'.
						'<input type="hidden" id="widget-item-order-'.$item->id.'" name="widget-item['.$item->id.'][_widget_item_order]" value="'.$item->menu_order.'"/>'.
						'<div class="pull-right item-controls">'.
							'<span class="item-type">'.$item_obj.'</span>'.
							'<span class="item-order hide-if-js">
								<a href="'.URL::to('admin/widget?widget='.$widget).'&action=move-up-widget-item&widget-item='.$item->id.'&_token='.csrf_token().'">&uarr;</a>
								|<a href="'.URL::to('admin/widget?widget='.$widget).'&action=move-down-widget-item&widget-item='.$item->id.'&_token='.csrf_token().'">&darr;</a>
							</span>'.
							'<span class="item-edit">
								<a data-toggle="collapse" data-parent="#nav-accordion" href="#collapse-'.$item->id.'">
										<span class="fa fa-angle-down"></span></a>'.
							'</span>
						</div>'.
		                '<div class="dd-handle js-dd-handle">'.
		                    '<span class="dd-handle-title">'.
		                    	$excrpt_title.
		                    	$status.
		                    '</span>'.
		                '</div>
		                <div id="collapse-'.$item->id.'" class="panel-collapse collapse">
                            <div class="panel-body">
                           		<div class="row">
	                           		<div class="col-lg-12">
	                           			<label for="post_title">Title</label>
										<div class="form-group">
											<input type="text" value="'.$title.'" name="widget-item['.$item->id.'][_widget_item_title]" class="form-control form-pretty" />
										</div>
									</div><!-- col-lg-12 -->
								</div><!-- row -->
								<div class="row">
									<div class="col-lg-12">
										<label for="post_title">Description</label>
											<div class="form-group">
												<textarea rows="10" name="widget-item['.$item->id.'][_widget_item_description]" class="form-control form-pretty">'.$item->post_content.'</textarea>
											</div>
									</div>
								</div><!-- row -->

								<div class="row">
									<div class="col-lg-12">
										<a href="'.URL::to('admin/widget?widget='.$widget).'&action=delete-widget-item&widget-item='.$item->id.'&_token='.csrf_token().'" class="btn btn-danger btn-tiny">Remove</a>
									</div>
								</div><!-- row -->
                            </div>
                        </div>';
				echo '</li>';
			}
			echo '</ol>';
		}
	}



	/**
	 * Admin menu navigation
	 *@param level, menu_location
	 *@return BOOL
	 */	
	public static function multi_level_navigation( $level = 0, $menu)
	{	
		$tblPrefix = DB::getTablePrefix();

		$sql = "SELECT * FROM ".$tblPrefix."posts p 
		LEFT JOIN ".$tblPrefix."term_relationships t ON p.id = t.object_id 
		WHERE p.post_type= ? and p.post_parent = ? and t.term_taxonomy_id = ? order by p.menu_order";
		$resultSet =  DB::select($sql, array('nav_menu_item',$level, $menu)); 

		if($resultSet)	
		{

			echo '<ol class="dd-list">';
			foreach($resultSet as $item)
			{	
				

				$post 		= PPost::find($item->id);
				$meta_arr = $post->postmeta->toArray();

                $meta = array();
                foreach($meta_arr as $arr )
                {
                	$meta[$arr['meta_key']] = $arr['meta_value'];
                }
                $item_type 		= $meta['_menu_item_type'];
                $item_obj 		= $meta['_menu_item_object'];
                $item_obj_id 	= $meta['_menu_item_object_id'];
                $item_target  	= isset($meta['_menu_item_target']) ? $meta['_menu_item_target']: 0;
                $is_new_window  = $item_target ? 'checked' : null;
                $item_url  		= $meta['_menu_item_url'] != '#' && $meta['_menu_item_url'] != '' ? self::addhttp($meta['_menu_item_url']) : '#';
                $item_classes 	= isset($meta['_menu_item_classes']) ? @unserialize($meta['_menu_item_classes']) : null;
                $item_classes 	= $item_classes;


                $menu_item = ($item_type == 'post') ? $post->getPostRow($item_obj_id) : null;
                
               
                $title = (empty($item->post_title) && isset($menu_item['post_title'])) ? $menu_item['post_title'] : $item->post_title;
        		$title = htmlentities($title);
                $excrpt_title = strlen($title) > 100 ? substr($title, 0, 97).'...' : $title;

                $status = $item->post_status == 'draft' ? ' <span class="label label-danger">Pending</span>' : null;

				echo '<li class="dd-item js-menu-item" data-id="'.$item->id.'">'.
						'<input type="hidden" name="menu-item['.$item->id.'][_menu_item_id]" value="'.$item->id.'"/>'.
						'<input type="hidden" id="menu-item-parent-'.$item->id.'" name="menu-item['.$item->id.'][_menu_item_parent]" value="'.$item->post_parent.'"/>'.
						'<input type="hidden" name="menu-item['.$item->id.'][_menu_item_level]" value="'.$item->menu_level.'"/>'.
						'<input type="hidden" id="menu-item-order-'.$item->id.'" name="menu-item['.$item->id.'][_menu_item_order]" value="'.$item->menu_order.'"/>'.
						'<div class="pull-right item-controls">'.
							'<span class="item-type">'.$item_obj.'</span>'.
							'<span class="item-order hide-if-js">
								<a href="'.URL::to('admin/menu?menu='.$menu).'&action=move-up-menu-item&menu-item='.$item->id.'&_token='.csrf_token().'">&uarr;</a>
								|<a href="'.URL::to('admin/menu?menu='.$menu).'&action=move-down-menu-item&menu-item='.$item->id.'&_token='.csrf_token().'">&darr;</a>
							</span>'.
							'<span class="item-edit">
								<a data-toggle="collapse" data-parent="#nav-accordion" href="#collapse-'.$item->id.'">
										<span class="fa fa-angle-down"></span></a>'.
							'</span>
						</div>'.
		                '<div class="dd-handle js-dd-handle">'.
		                    '<span class="dd-handle-title">'.
		                    	$excrpt_title.
		                    	$status.
		                    '</span>'.
		                '</div>
		                <div id="collapse-'.$item->id.'" class="panel-collapse collapse">
                            <div class="panel-body">';
                      
                            if($item_type == 'custom'):
                           	echo '<div class="row">
									<div class="col-lg-12">
										<label for="post_title">URL</label>
										<div class="form-group">
											<input type="text" name="menu-item['.$item->id.'][_menu_item_url]" value="'.$item_url.'" class="form-control form-pretty" />
										</div>
									</div>
								</div>';
							endif;
                           
                           echo '
                           		<div class="row">
	                           		<div class="col-lg-6 col-md-6">
	                           			<label for="post_title">Navigation Label</label>
										<div class="form-group">
											<input type="text" value="'.$title.'" name="menu-item['.$item->id.'][_menu_item_title]" class="form-control form-pretty" />
										</div>
									</div><!-- col-lg-6 -->
									<div class="col-lg-6 col-md-6">
										<label for="post_title">Title Attribute</label>
										<div class="form-group">
											<input type="text" value="'.strip_tags($item->post_excerpt).'" name="menu-item['.$item->id.'][_menu_item_attr_title]" class="form-control form-pretty" />
										</div>
									</div>
								</div><!-- row -->
								<noscript>
								    
								</noscript>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="checkbox" name="menu-item['.$item->id.'][_menu_item_target]" value="1" '.$is_new_window.'/> Open new window
										</div>
									</div>
								</div><!-- row -->
								<div class="row">
									<div class="col-lg-12">
										<label for="post_title">CSS Classes (optional)</label>
										<div class="form-group">
											<input type="text" name="menu-item['.$item->id.'][_menu_item_classes]" class="form-control form-pretty" value="'.$item_classes.'"/>
										</div>
									</div>
								</div><!-- row -->
								<div class="row">
									<div class="col-lg-12">
										<label for="post_title">Description</label>
											<div class="form-group">
												<textarea rows="2" name="menu-item['.$item->id.'][_menu_item_description]" class="form-control form-pretty">'.$item->post_content.'</textarea>
											</div>
									</div>
								</div><!-- row -->

								<div class="row">
									<div class="col-lg-12">
										<a href="'.URL::to('admin/menu?menu='.$menu).'&action=delete-menu-item&menu-item='.$item->id.'&_token='.csrf_token().'" class="btn btn-danger btn-tiny">Remove</a>
									</div>
								</div><!-- row -->
                            </div>
                        </div>';

               	$sql = "SELECT * FROM ".$tblPrefix."posts WHERE post_type= ? and post_parent = ? order by menu_order";
				$hasChild =  DB::select($sql, array('nav_menu_item',$item->post_parent));
				
				if($hasChild) 
				{

					self::multi_level_navigation($item->id, $menu);
				}
				echo '</li>';
				
			}

			
			echo '</ol>';
		}
		
		
                                  
        
	}

	/**
	 * build ordering
	 *
	 *@param parent_id(int), level(int)
	 *@return array
	 */

	public static function nav_ordering_arr($parent, $level)
	{
		$tblPrefix = DB::getTablePrefix();
		$sql = "SELECT id, post_title FROM ".$tblPrefix."posts WHERE menu_level = ? and post_parent = ? order by menu_order asc";
		$resultSet =  DB::select($sql, array($level, $parent)); 
		$arr = array();

		foreach($resultSet as $item)
		{
			$arr[$item->id] = $item->post_title;
		}

		return $arr;
	}


	/**
	 * Get loyalty points lists
	 *@param none
	 *@return object
	 */
	public static function CSKList()
	{
		$resultSet = \DB::table('loyalty_points_settings')
			->leftJoin('levels', 'loyalty_points_settings.level_id', '=', 'levels.id')
			->select('loyalty_points_settings.level_id', 'loyalty_points_settings.redeemed', 'loyalty_points_settings.earned', 'levels.name')
			->get();

		return $resultSet;
	}


	public static function countryNameByCode($code)
	{
		$name = \DB::table('countries')->where('code', '=', $code)->pluck('name');
		return $name;
	}

	/**
	 * Get arry of country
	 *@param none
	 *@return object
	 */
	public static function countries()
	{

		$countries = \DB::table('countries')->lists('name', 'code');//->get();
		return $countries;
	}


	
	/**
	 * Get featured media thumbnail image
	 *@param none
	 *@return object
	 */

	public static function postFeatureMediaThumb($content, $size = false)
	{

		// check if string ends with image extension
		if (preg_match('/(\.jpg|\.png|\.bmp|\.jpeg)$/', $content)) {
		    return $content;
		// check if there is youtube.com in string
		} 
		elseif (strpos($content, "youtube.com") !== false) {

			try{
				if($querystring=parse_url($content,PHP_URL_QUERY))
			    {   
			        parse_str($querystring);
			        if(!empty($v))
			        {
			        	$imgsize = $size == false ? 'default.jpg' : '0.jpg';
			        	return "http://img.youtube.com/vi/$v/$imgsize";
			        }
			        else return false;

			    }
			    else return false;
			}
			catch(\Exception $e)
			{
				return URL::to('assets/global/placeholders/video.png');
			}
		// check if there is vimeo.com in string
		} 
		elseif (strpos($content, "vimeo.com") !== false) 
		{
			preg_match('/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',$content,$matches);
			$imgid = $matches[2];
			try
			{
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
				//thumbnail_small, thumbnail_medium, thumbnail_large
				if( !$size ) return $hash[0]['thumbnail_small']; 
				else return $hash[0][$size]; 
			}
			catch(\Exception $e)
			{
				return URL::to('assets/global/placeholders/video.png');
			}
		} 

		return false;
	}


	/**
	 * Get featured media object
	 *@param none
	 *@return object
	 */
	public static function postFeatureMedia($content)
	{
		// check if string ends with image extension
		if (preg_match('/(\.jpg|\.png|\.bmp)$/', $content)) {
		    return "<img src='$content' >";
		// check if there is youtube.com in string
		} 
		elseif (strpos($content, "youtube.com") !== false) {

			preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $content,$matches);
			$embedUrl =($matches) ? '//www.youtube.com/embed/'.$matches[1] : $content;

		    return "<iframe src='$embedUrl' width='100%' height='390' frameborder='0'  allowfullscreen></iframe>";
		// check if there is vimeo.com in string
		}
		elseif (strpos($content, "vimeo.com") !== false) 
		{
			preg_match('/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/',$content,$matches);
			$embedUrl =($matches) ? '//player.vimeo.com/video/'.$matches[2] : $content;
		    return "<iframe src='$embedUrl' width='100%' height='390' frameborder='0' webkitallowfullscreen='' mozallowfullscreen='' allowfullscreen=''></iframe>";
		} 
		else {
		    return false;
		}
	}


	public static function logLoyaltyPoints($user_id, $points, $description)
	{
		$result = \DB::table('loyalty_points')->insert(array(
				'user_id' 				=> $user_id,
				'loyalty_points' 		=> (float)$points,
				'loyalty_information' 	=> $description,
				'created_at'			=> date('Y-m-d H:i:s'),
				));

		return $result;
	}
	/**
	 * Process referral
	 *@param email
	 *@return boolean
	 */

	public static function processReferral( $email )
	{

		//Check if email is on shared email
		$sender_id = \DB::table('posts_shared')->where('email', $email)->pluck('user_id');

		if( $sender_id )
		{
			//Get earned points of specific level
			$points = \DB::table('users')
			->join('referral_settings', 'users.level_id', '=', 'referral_settings.level_id')
			->where('users.id',$sender_id)
			->pluck('successfull_referral');

			//save to log
			$result = self::logLoyaltyPoints($sender_id, $points, 'Successfull Referral to '.$email);

			//check if loyalty points was saved.
			if($result)
			{
				$user = User::find($sender_id);

				$user->points = (float)$user->points + $points;
				$user->save(); 
				return true;
			}
			
		}


		return false;
	}

	
	/**
	 * Get current page url
	 *@param email
	 *@return boolean
	 */

	public static function curPageURL() 
	{

		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") 
		{
			$pageURL .= "s";
		}

		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") 
		{
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} 
		else 
		{
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;


	}

	/**
	 * Product pagination
	 *@param none
	 *@return string
	 */

	public static function productPagination($totalItems)
	{

		$s 			= Input::get('s');

		$page 		= Input::get('page');
		$page 		= ($page) ? $page : 1;
		$pager 		= ($page) ? ceil($page / 3) : 1;
		$pager  	= ($pager > 1) ? $pager : 1;
		$per_page 	= Settings::get('post_per_page') ? Settings::get('post_per_page') : 9;
		$totalPage 	= ceil($totalItems / $per_page);

		$next 		= ($page < $totalPage) ? $page + 1 : $page;
		$prev 		= ($page > 1)? $page - 1 : $page;
		$innerHTML 	= '';

		$innerHTML .= '<div class="pull-right">'.
						'<ul class="pagination 1">'.
						'<li class="prev '.($page == 1 ? 'disabled' : null).'">'.
						'<a href="?s=&page=1"><i class="fa fa-angle-double-left"></i></a>'.
						'</li>'.
						'<li class="prev '.($page == $prev ? 'disabled' : null).'">'.
						'<a href="?s=&page='.$prev.'"><i class="fa fa-angle-left"></i></a>'.
						'</li>';
		for($i = 1; $i <= 10; $i++)
		{

			if($totalPage < $pager)
			{
				break;
			}
			$innerHTML .=	'<li data-page="'.$pager.'" class="'.(($page == $pager) ? 'active' : null).'">'.
							'<a href="?s='.$s.'&page='.$pager.'">'.$pager.'</a>'.
							'</li>';
			$pager++;
		}

		$innerHTML .=	'<li class="next '.($page == $next ? 'disabled' : null).'">'.
						'<a href="?s=&page='.$next.'"><i class="fa fa-angle-right"></i></a></li>'.
						'<li class="next '.($page == $totalPage ? 'disabled' : null).'">'.
						'<a href="?s=&page='.$totalPage.'"><i class="fa fa-angle-double-right"></i></a>'.
						'</li>'.
						'</ul>'.
						'</div>';

	  	return $innerHTML;
	}

	/**
	 * Get carts
	 *@param none
	 *@return array
	 */

	public static function getCart()
	{

		$cart = Session::get('cart');

	

		$items 			= array();
		$_cart 			= array();
		$subTotal 		= 0;
		$totalQty 		= 0;
		$total 			= 0;
		$totalEarned 	= 0;
		$totalRedeemable = 0;

		if($cart)
		{


			foreach( $cart as $productCode => $item )
			{
				
				$post = PPost::find($item['post_id']);
				$arrItem = array();

				if($post->product)
				{
					$arrItem = $post->product->toArray();
				}
				
				$arrItem['productEarned'] 	= 0;
				$arrItem['productRedeemed'] = 0;

				if(Auth::check())
				{
					if($userLevel = Level::find(Auth::User()->level_id))
					{
						//Get the global points setting by level
						$globalLoyaltyPoints = LoyaltyPointsSettings::find( Auth::User()->level_id );

						$userLevel = $userLevel->toArray();
						//Get product total earned points
						$custEarned = PostMeta::getPostMetaValue(Str::slug($userLevel['name'],'_').'_earned', $post->id);
						//Get product total redeemed points
						$custRedeemed = PostMeta::getPostMetaValue(Str::slug($userLevel['name'],'_').'_redeemed', $post->id);
						//check if product total earned was set.
						$custEarned =  $custEarned != '' ? $custEarned : $globalLoyaltyPoints->earned;
						//check if product total redeemed was set.
						$custRedeemed = $custRedeemed != '' ? $custRedeemed : $globalLoyaltyPoints->redeemed;

						$arrItem['productEarned'] 	= (float)$custEarned * (int)$item['quantity'];
						$arrItem['productRedeemed'] = (float)$custRedeemed * (int)$item['quantity'];
					}
				}

				
				

				$discount = $arrItem['discount'] != 0 ? $arrItem['discount'] / 100 : 1;
				$price 	 = $arrItem['sale_price'] == 0 ? $arrItem['price'] : $arrItem['sale_price'];


				$payout = (float)$discount * (float)$price;

				$stotal 	= (int)$item['quantity'] * (float)$payout;//$arrItem['sale_price'];


				$arrItem['productName'] = $post->post_title;
				$arrItem['cartQty'] 		= $item['quantity'];
				$arrItem['productSalePrice'] = $arrItem['sale_price'];
				$arrItem['productPayout']	= $payout;	
				$arrItem['productPrice'] 	= $arrItem['price'];
				$arrItem['productDiscount']	= $arrItem['discount'];
				$arrItem['productCode']		= $arrItem['productCode'];
				$arrItem['cartSubTotal'] 	= $stotal;
				$arrItem['thumbnail']		= Site::postFeatureMediaThumb(PPost::mediaAttachment($arrItem['post_id'], 'thumbnail'));
				
				

				$_cart[] = $arrItem;
				$totalEarned += (float)$arrItem['productEarned'];
				$totalRedeemable += (float)$arrItem['productRedeemed'];
				$subTotal += $stotal;
				$totalQty += (int)$item['quantity']; 
				

			}
		}
		$items['cart'] 		= $_cart;
		$items['totalQty']	= $totalQty;
		$items['subTotal'] 	= $subTotal;
		$items['totalEarned'] = $totalEarned;
		$items['totalRedeemable'] = $totalRedeemable;
		$items['custPoints'] = Auth::check() ? $totalRedeemable : 0;

		return $items;
	}

	public static function getTotalCartItems()
	{
		$items  = self::getCart();

		return $items['totalQty'];
	}

	public static function getCartTotalAmnt()
	{
		$items  = self::getCart();

		return $items['subTotal'];
	}

	public static function getPointsToRedeemed($totalRedeemable)
	{
		//$items  = self::getCart();
		
		return Auth::User()->points > $totalRedeemable ? $totalRedeemable : Auth::User()->points;
	}

	/**
	 * Top navigation cart
	 *@param none
	 *@return string
	 */

	public static function topNavCartItems()
	{
		$items  = self::getCart();
		$innerHTML = '';
		
		if( $items['totalQty'] > 0 )
		{
			foreach($items['cart'] as $item)
			{
	        $innerHTML .= '<li class="product__item">
	                  <a href="#">
	                    <img src="'.$item['thumbnail'].'" alt="" class="pull-left product__image mr-10px">
	                    <span class="product__title">'.$item['productName'].'</span>
	                    <span class="product__quantity"><strong class="quantity__views">'.$item['cartQty'].'</strong> x <strong class="quantity__price">'.Settings::get('prod_currency_symbol').Sitetbo::formatNumber($item['productSalePrice']).'</strong></span>
	                  </a>
	                  <a href="'.URL::to('cart/remove?productCode='.$item['productCode']).'" data-product-code="'.$item['productCode'].'" class="product__remove remove-badge-cart">
	                    <i class="fa fa-times"></i>
	                  </a>
	                </li>';

	        }

	       	$innerHTML .= '<li>
                  <div class="product__subtotal">
                  
                    <div class="pull-right">
                      <div class="clearfix mb-10px">
                        <strong class="mr-5px">Subtotal:</strong> 
                        <span class="price">'.Settings::get('prod_currency_symbol').Sitetbo::formatNumber($items['subTotal']) .'</span>
                      </div>
                      <a href="'. URL::to('checkout/step/index') .'" class="btn btn-blue btn-checkout btn-sm pull-right">Checkout</a>
                    </div>
                  
                  </div>
                </li>';
     	}
     	else
     	{
     		$innerHTML .= '<li class="product__item"><div class="empty-cart product__empty">Your cart is empty.</div></li>';
     	}

        return $innerHTML;
	}

	/**
	 * Process paypal payment
	 *@param none
	 *@return none
	 */

	public static function process_paypal( $input )
	{

		$PayPalMode 			= Settings::get('payment_mode');//'sandbox'; // sandbox or live
		$PayPalApiUsername 		= Settings::get('paypal_api_username');//'philweb.pprogrammer49_api1.gmail.com'; //PayPal API Username
		$PayPalApiPassword 		= Settings::get('paypal_api_password');//'1386583187'; //Paypal API password
		$PayPalApiSignature 	= Settings::get('paypal_api_signature');//'AxtNopGeHglMyNcsbCPiF7N2mEu5A.anpdVN73fVvBAkbK4Ct.Y2t-ae'; //Paypal API Signature
		$PayPalCurrencyCode 	= Settings::get('paypal_currency');//'USD'; //Paypal Currency Code
		$PayPalReturnURL 		= URL::to('checkout/paypal-return-url'); //Point to process.php page
		$PayPalCancelURL 		= URL::to('/'); //Cancel URL if 

		$items  = self::getCart();

		$padata = "";


		$index = 0;

		

		foreach( $items["cart"] as $item)
		{
			$cartQty 	= (int)$item['cartQty'];
			$itemAmnt 	= $item['productPayout'];//$item['productSalePrice'];
			$trdmd 		= $item['productRedeemed'];

			$padata .=	"&L_PAYMENTREQUEST_0_QTY$index=".urlencode($cartQty).
						"&L_PAYMENTREQUEST_0_AMT$index=".urlencode($itemAmnt).
						"&L_PAYMENTREQUEST_0_NAME$index=".urlencode($item['productName']).
						"&L_PAYMENTREQUEST_0_NUMBER$index=".urlencode($item['productCode']);

			$index++;
		}

		$subTotal = $items['subTotal'];
		$redeemed = 0;

		if(isset($input['usepoints']))
		{
			//Get customer points
			$custPoints = Auth::User()->points;

			
			$totalRedeemable = $items['totalRedeemable'];
			//check if csk points is greater than total redeemable points
			if( $custPoints > $totalRedeemable )
			{
				$redeemed = $totalRedeemable;
				//Deduct totalredeemable to subtotal
				$subTotal -= $totalRedeemable; 
			}
			else
			{
				$redeemed = $custPoints;
				//Deduct totalredeemable to subtotal
				$subTotal -= $custPoints;
			}

			$padata .=	"&L_PAYMENTREQUEST_0_AMT$index=-".$redeemed.
						"&L_PAYMENTREQUEST_0_NAME$index=Loyalty Points";
		}
		

		$padata .= 	"&CURRENCYCODE=".urlencode(Settings::get('paypal_currency')).
					"&PAYMENTACTION=Sale".
					"&ALLOWNOTE=1".
					"&PAYMENTREQUEST_0_CURRENCYCODE=".urlencode(Settings::get('paypal_currency')).
					"&PAYMENTREQUEST_0_AMT=".urlencode($subTotal).
					"&PAYMENTREQUEST_0_ITEMAMT=0".urlencode($subTotal).
					"&AMT=".urlencode($subTotal).
					"&RETURNURL=".urlencode($PayPalReturnURL).
					"&CANCELURL=".urlencode($PayPalCancelURL);



		//Check if customer use points
		if(isset($input['usepoints']))
		{
			//Get order
			$order = Order::find(Session::get('order_number'));
			//Update order customer points used
			$order->customer_redeemed_points = $redeemed;
			$order->save();
		}


		$paypal = new PayPal();

		$httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

		//Respond according to message we receive from Paypal
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{
				
			if($PayPalMode=='sandbox')
			{
				$paypalmode 	=	'.sandbox';
			}
			else
			{
				$paypalmode 	=	'';
			}
			//Redirect user to PayPal store with Token received.
		 	return array('status' => true, 'url' => 'https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"]);

			 
		}
		else
		{
			return array('status' => false, 'error_msg' => urldecode($httpParsedResponseAr['ACK'].': '.$httpParsedResponseAr['L_LONGMESSAGE0']));
		}
	}


	public static function process_paypal_rtrn_url()
	{
		$PayPalMode 			= Settings::get('payment_mode');//'sandbox'; // sandbox or live
		$PayPalApiUsername 		= Settings::get('paypal_api_username');//'philweb.pprogrammer49_api1.gmail.com'; //PayPal API Username
		$PayPalApiPassword 		= Settings::get('paypal_api_password');//'1386583187'; //Paypal API password
		$PayPalApiSignature 	= Settings::get('paypal_api_signature');//'AxtNopGeHglMyNcsbCPiF7N2mEu5A.anpdVN73fVvBAkbK4Ct.Y2t-ae'; //Paypal API Signature
		$PayPalCurrencyCode 	= Settings::get('paypal_currency');//'USD'; //Paypal Currency Code
		$PayPalReturnURL 		= URL::to('checkout/paypal-return-url'); //Point to process.php page
		$PayPalCancelURL 		= URL::to('/'); //Cancel URL if 

		//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
		if(isset($_GET["token"]) && isset($_GET["PayerID"]))
		{
			//we will be using these two variables to execute the "DoExpressCheckoutPayment"
			//Note: we haven't received any payment yet.
			
			$token 		= $_GET["token"];
			$playerid 	= $_GET["PayerID"];
			
			
			$padata = 	'&TOKEN='.urlencode($token).
						'&PAYERID='.urlencode($playerid).
						'&PAYMENTACTION='.urlencode("SALE").
						'&AMT='.urlencode(self::getCartTotalAmnt()).
						'&CURRENCYCODE='.urlencode(Settings::get('paypal_currency'));
			
			//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
			$paypal= new PayPal();
			$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
			
			//Check if everything went ok..
			if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
			{
  
				$msgHTML = '';
				$msgHTML .= '<p>Your Transaction ID : <span class="label label-info label-transaction-id">'.urldecode($httpParsedResponseAr["TRANSACTIONID"]).'</span></p>';
				
				
				/*
				//Sometimes Payment are kept pending even when transaction is complete. 
				//May be because of Currency change, or user choose to review each payment etc.
				//hence we need to notify user about it and ask him manually approve the transiction
				*/
				
				$txnid = $httpParsedResponseAr["TRANSACTIONID"];
				
				if('Completed' == $httpParsedResponseAr["PAYMENTSTATUS"])
				{
					$msgHTML .= '<p>Payment Received! Your product will be sent to you very soon!</p>';
				}
				elseif('Pending' == $httpParsedResponseAr["PAYMENTSTATUS"])
				{
					$msgHTML .= '<p>Transaction Complete, but payment is still pending! You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></p>';
				}

				$transactionID = urlencode($httpParsedResponseAr["TRANSACTIONID"]);
				$nvpStr = "&TRANSACTIONID=".$transactionID;
				$paypal= new PayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('GetTransactionDetails', $nvpStr, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
					
					if(!$payment = Payment::find($txnid))
					{
						$payment = new Payment;
					}
					
					$payment->txnid 			= $httpParsedResponseAr["TRANSACTIONID"];
					$payment->order_number 		= Session::get("order_number");
					$payment->payment_amount 	= self::getCartTotalAmnt();
					$payment->payment_status 	= $httpParsedResponseAr["PAYMENTSTATUS"];
					$payment->created_time 		= date('Y-m-d H:i:s');
					$payment->save();
					//Get order
					$order = Order::find(Session::get("order_number"));
					if( $order->customer_redeemed_points != 0 )
					{
						//Deduct points to the customer for this order
						self::redeemedPoints($order->user_id, $order->customer_redeemed_points);
					}

					if( $payment->payment_status == 'Completed' )
					{
						$order->order_status = 'Complete';
						$order->save();
					}


					if($order->total_points_to_earn != 0)
					{
						//Add points to the customer
						self::earnPoints($order->user_id, $order->total_points_to_earn);
					}

					if( $order->customer_redeemed_points != 0 )
					{
						//Log loyalty points
						self::logLoyaltyPoints($order->user_id, '-'.$order->customer_redeemed_points, 'Redeemed on order of '.Session::get("order_number"));
					}
					//Log loyalty points
					self::logLoyaltyPoints($order->user_id, $order->total_points_to_earn, 'Successfully order of '.Session::get("order_number"));
					//Log customer spending
					self::logCustomerSpending($order->user_id, $order->total_price);

					//Log Customer Referral points for successfull payment
					if($referral = self::getCustomerReferral( Auth::User()->email ))
					{

						$referralSettings = ReferralSettings::find(Auth::User()->level_id);
						//get referral settings
						$percentage = $referralSettings->percentage_of_products;
						//$points = $percentage ? ( $percentage / 100) * $order->total_price : $percentage;

						$points = 0;
						//Get all product sub total by order id
						$item_sub_total = DB::table("order_details")->where("order_id", $order->id)->lists("item_sub_total");
						if( $item_sub_total )
						{
							foreach( $item_sub_total as $total )
							{
								$points += $percentage ? ( $percentage / 100) * $total : 0;
							}
						}

						if( $points != 0 )
						{
							if(self::earnPoints( $referral, $points ))
							{
								//Log loyalty points
								self::logLoyaltyPoints( $referral, $points, 'Affiliate '.Auth::User()->email.' Successfully order of '.Session::get("order_number"));
							}
						}
					}

					$user 	= Auth::User();
					$order 	= Order::find(Session::get("order_number"));

					$dateFormat = Settings::get('date_format') == 'custom' ? Settings::get('date_format_custom') : Settings::get('date_format');
					$timeFormat = Settings::get('time_format') == 'custom' ? Settings::get('time_format_custom') : Settings::get('time_format');
				
					$data = array(
						'items' 			=> self::getCart(),
						'payment_status' 	=> $httpParsedResponseAr["PAYMENTSTATUS"],
						'customer_name'		=> $user->firstname.' '.$user->lastname,
						'customer_email'	=> $user->email,
						'customer_phone'	=> $user->mobile,
						'customer_address' 	=> $user->address_1,
						'order_recipient_email' => Settings::get('order_recipient_email'),
						'order_recipient_name' => Settings::get('order_recipient_name'),
						'payment_method'	=> 'paypal',
						'date_order'		=> date("$dateFormat $timeFormat",strtotime($order->date_order)),
						'order_status'		=> $order->order_status,
						'order_no' 			=> Session::get("order_number")
					);

					
					//Send email notification to customer
					Mail::send('emails.customer_order_notification',$data, function($message)  use($user){
						$message->to($user->email, $user->firstname.' '.$user->lastname)->subject('Sitetbo Order notification');
					});
					//Send email notification to administrator
					Mail::send('emails.site_order_notification',$data, function($message)  use($data){
						$message->to($data['order_recipient_email'], $data['order_recipient_name'])->subject('New order notification');
					});

					//Remove cart session
					Session::forget('cart');
					//Remove order number session
					Session::forget('order_number');

				} 
				else  
				{
					$msgHTML .= urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);

				}

				return array('status' => true, 'message' => $msgHTML);
			
			}
			else
			{
				$msgHTML = urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]);
				return array('status' => true, 'message' => $msgHTML);
			}
		}
	}


	/*==============================================
	 * Reporting
	 */

	
	/**
	 * Get whole year total Sales
	 *@param year
	 *@return result - object array
	 */
	public static function earningGraphs( $y )
	{

		$sql = "SELECT substr(m.month,1, 3) as month_order, ( SELECT (sum(total_price)/ 100000) * 100 from gy_orders where order_status = 'Complete' and DATE_FORMAT(date_order, '%m') = m.id and DATE_FORMAT(date_order, '%Y') = ?  ) as total_order FROM gy_months as m order by m.id asc";
		
		return DB::select( $sql, array($y) );
	}


	public static function todaySales()
	{

		return Order::whereRaw("DATE_FORMAT(date_order, '%Y-%m-%d') = DATE_FORMAT(CURDATE(), '%Y-%m-%d')")->lists('total_price');
	}

	public static function thisMonthSales()
	{

		return Order::whereRaw("DATE_FORMAT(date_order, '%m') = DATE_FORMAT(CURDATE(), '%m') AND order_status = 'Complete' ")->lists('total_price');
	}



	/**
	 * Get total Sales
	 *@param none
	 *@return none
	 */
	public static function getTotalSales()
	{
		return (float)Order::where('order_status', 'Complete')->sum('total_price');
	}


	/**
	 * Get total Profit
	 *@param none
	 *@return none
	 */
	public static function getTotalMonthSales( $m )
	{
		return (float)Order::whereRaw('DATE_FORMAT(date_order, "%m") = '.$m.' AND order_status = "Complete"')->sum('total_price');
	}

	/**
	 * Get total Profit
	 *@param none
	 *@return none
	 */
	public static function getTotalTodaySales(  )
	{
		return (float)Order::whereRaw("DATE_FORMAT(date_order, '%Y-%m-%d') = DATE_FORMAT(CURDATE(), '%Y-%m-%d')")->sum('total_price');
	}

	/**
	 * Get total New Members
	 *@param none
	 *@return none
	 */
	public static function getTotalNewMembers( $m )
	{
		return (int)User::leftJoin('groups', 'users.group_id', '=', 'groups.id')->whereRaw('DATE_FORMAT(gy_users.created_at, "%m") = '.$m.' AND gy_groups.group = "Customer"')->count();
	}


	/**
	 * Get total Members
	 *@param none
	 *@return none
	 */
	public static function getTotalMembers()
	{
		return (int)User::leftJoin('groups', 'users.group_id', '=', 'groups.id')->whereRaw('gy_groups.group = "Customer"')->count();
	}

	

	/**
	 * Get Month total order
	 *@param none
	 *@return count  - Month total order (int)
	 */
	public static function getMonthTotalOrders( $m )
	{
        return 0;
		return Order::whereRaw('DATE_FORMAT(date_order, "%m") = '.$m.'  AND order_status = "Complete"')
		->count();
	}


	/**
	 * Get Month total sales
	 *@param none
	 *@return total_sales  - Month total sales (float)
	 */
	public static function getMonthSales( $m )
	{
        return 0;
//		return (float)Order::whereRaw('DATE_FORMAT(date_order, "%m") = '.$m.'  AND order_status = "Complete"')
//		->sum('total_price');
	}


	/**
	 * Get Today total order
	 *@param none
	 *@return count  - Today total order (int)
	 */
	public static function getTodayTotalOrders()
	{
        return 0;
		return (int)Order::whereRaw('DATE_FORMAT(date_order, "%Y-%m-%d") = curdate() AND order_status = "Complete"')
		->count();
	}


	/**
	 * Get Today total sales
	 *@param none
	 *@return total_sales  - today total sales (float)
	 */
	public static function getTodaySales()
	{
        return 0;
		return (float)Order::whereRaw('DATE_FORMAT(date_order, "%Y-%m-%d") = curdate() AND order_status = "Complete"')
		->sum('total_price');
	}

	/**
	 * Get Last week total sales
	 *@param none
	 *@return total_sales  - last week total sales (float)
	 */
	public static function getLastWeekTotalSales()
	{
        return 0;

		return (float)Order::whereRaw('date_order >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND date_order < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY AND order_status = "Complete"')
		->sum('total_price');
	}

	/**
	 * Get Last week total order
	 *@param none
	 *@return total_sales  - last week total order (int)
	 */
	public static function getLastWeekTotalOrders()
	{
        return 0;

		return (int)Order::whereRaw('date_order >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND date_order < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY AND order_status = "Complete"')
		->count();
	}

    public static function getTitles() {
        return array(
            'Mr' => 'Mr',
            'Mrs' => 'Mrs',
            'Miss' => 'Miss',
            'Ms' => 'Ms',
            'Dr' => 'Dr'
        );
    }

    public static function auStates() {
        return array(
            "NSW"=>"New South Wales",
            "VIC"=>"Victoria",
            "QLD"=>"Queensland",
            "TAS"=>"Tasmania",
            "SA"=>"South Australia",
            "WA"=>"Western Australia",
            "NT"=>"Northern Territory",
            "ACT"=>"Australian Capital Terrirory");
    }

    public static function getLumpSumType() {
        return array(
            'T' => 'T',
            'R' => 'R'
        );
    }

    public static function getSelfEducationType() {
        return array(
            'K' => 'K',
            'I' => 'I',
            'O' => 'O'
        );
    }

    public static function getPHIBenefitCodes() {
        return array(
            30 => 30,
            40 => 40,
            45 => 45
        );
    }

    public static function getPHIHealthFundNames() {
        return array(
            "MBP - medicare Private" => "MBP - medicare Private",
        );
    }



    public static function getPHITypeOfCoverage() {
        return array(
            "MBP - medicare Private"            => "Ancillary",
            "Hospital Cover"                    => "Hospital Cover",
            "Combined Hospital and Ancillary"   => "Combined Hospital and Ancillary",
        );
    }

    public static function getPHITaxClaimCode() {
        return array(
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E',
            'F' => 'F',
        );
    }

    public static function getSelectYesOrNo() {
        return array(
            0 => 'No',
            1 => 'Yes'
        );
    }

    public static function getZoneAmount($which_zone) {
        $zone_code = array(
            'a' => '1173',
            'b' => '1173',
            'x' => '338',
            'y' => '57',
            'z' => '338',
        );

        if (array_key_exists($which_zone,$zone_code)) {
            return $zone_code[$which_zone];
        } else {
            return $zone_code['a'];
        }
    }



    public static function getUniformDescription() {
        return array(
            'Compulsory Work Uniform'       => 'Compulsory Work Uniform',
            'Non-compulsory Work Uniform'   => 'Non-compulsory Work Uniform',
            'Occupation Specific Clothing'  => 'Occupation Specific Clothing',
            'Protective Clothing'           => 'Protective Clothing',
        );
    }

    public static function whichProcessActive($which_process = "income") {

        $process__active_class = array(
            'income' => 'process-2-active',
            'deductions' => 'process-3-active',
            'tax_offsets' => 'process-4-active',
            'summary' => 'process-5-active',
        );

        if (array_key_exists($which_process,$process__active_class)) {
            return $process__active_class[$which_process];
        } else {
            return $process__active_class['income'];
        }
    }

    public static function getMessageHasCoveredPPHC() {

        if ( TaxMedicare::hasCoveredPPHC(Session::get('user_tax_year_id')) ) {

            $message = '<i class="fa fa-question-circle"></i> Because you answered "Yes" to the question "For the whole tax period...." or there were days that you indicated you were not liable for the Medicare surcharge, you need to enter your Private Health Insurance details in Tax Offsets.';

            ?>
            <div class="alert alert-info">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?php echo $message; ?>
            </div>
            <?php
        }

    }



    public static function getUserTaxYearStatus( $status ) {
        $status__markup_label = array(
            UserTaxYear::STATUS_PAID_AND_SUBMITTED => '<span class="lasbel labesl-progress">Paid And Sumitted</span>',
            UserTaxYear::STATUS_IN_PROGRESS => '<span class="labesl label-progresss">In Progress</span>',
            UserTaxYear::STATUS_REVIEWED_BY_ACCOUNTANT => '<span class="labesl labsel-progress">Reviewed By Accountant</span>',
            UserTaxYear::STATUS_REVIEWED_BY_AGENT => '<span class="lasbel label-psrogress">Reviewed By Agent</span>',
            UserTaxYear::STATUS_SUBMITTED_TO_ATO => '<span class="lasbel label-psrogress">Submitted To ATO</span>',
        );

        if (array_key_exists($status,$status__markup_label)) {
            return $status__markup_label[$status];
        } else {
            return $status__markup_label[UserTaxYear::STATUS_IN_PROGRESS];
        }
    }


    // CMS HELPER
    public static function getSearch()  { ?>
        <form role="form" class="form-inline form-rounded">
				<div class="form-group">
					<i class="fa fa-search"></i>
					<input value="<?php Input::has('q') ? Input::get('q') : null ?>" type="text" placeholder="Search.." name="s" id="s" class="form-control">
				</div>
			</form>
    <?php }



}