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

	public static function system_messages()
	{
		//Display single success message
		if(Session::has('success_msg')): ?>
			<div class="alert alert-omega alert-small alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check mr-5px"></i>
               	<?php echo Session::get('success_msg'); ?>
            </div>
		<?php endif;
		//Display modal message
		if (Session::has('modal_msg')): ?>
			<noscript>
			<div class="section section--offset-bottom">
	            <div class="alert alert-omega alert-small alert-danger fade in">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <i class="fa fa-info-circle"></i>
	               	<?php 
	               	$modalMessage = Session::get('modal_msg');
	               	print_r($modalMessage['message']); ?>
	            </div>
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
		if (Session::has('error_msg')): ?>
			<div class="section section--offset-bottom">
	            <div class="alert alert-omega alert-small alert-danger fade in">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <i class="fa fa-info-circle"></i>
	               	<?php print_r(Session::get('error_msg')); ?>
	            </div>
	        </div>
		<?php endif; 
		//Display all errors
		if (Session::has('errors')): 
			$errors = Session::get('errors');
	
		?>
			

			<div class="alert alert-omega alert-small alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-info-circle"></i>
				Error: Please check fields. <br />
		               
               	<?php foreach ($errors as $el => $messages)
					{
						foreach($messages as $message)
						{
					    	echo $message .'<br />';
					    }
					} ?>
		    </div>
		<?php			
		endif;
		
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
		->remember(10)
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


	public static function getWidget( $arr = array() )
	{
		extract($arr);


		$default = array(
			'showTitle' => isset($showTitle) ? $showTitle : null,
			'widget'		=> isset($widget) ? $widget : null,
			'widgetWrap' => isset($widgetWrap) ? $widgetWrap : null,
			'widgetWrapClass' => isset($widgetWrapClass) ? $widgetWrapClass : null,
			'titleWrap' => isset($titleWrap) ? $titleWrap : null,
			'titleWrapClass' => isset($titleWrapClass) ? $titleWrapClass : null,
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
		->remember(10)
		->get();


		if($resultSet)
		{
			foreach($resultSet as $k => $result)
			{
				if( $widgetWrap )
					echo '<'.$widgetWrap.' class="'.$widgetWrapClass.'">';
				//echo '<div class="container">';
				if( $showTitle ) {
					if( $titleWrap )
						echo '<'.$titleWrap.' class="'.$titleWrapClass.'" >';
					echo $result->post_title;
					if( $titleWrap )
						echo '</'.$titleWrap.'>';
					
				}

				echo the_content($result->post_content);
				//echo '</div>';

				if( $widgetWrap )
					echo '</'.$widgetWrap.'>';
			}

			
		}


	}


	/**
	 * Theme navigation
	 *@param user_id, points
	 *@return BOOL
	 */
	public static function site_nav_menu( $arr = array() )
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
		->remember(10)
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
					->remember(10)
					->first();

					if($hasChild)
					{
						$default = array(
							'level' 	=> $item->id,
							'menu'		=> isset($menu) ? $menu : null,
						);

						self::site_nav_menu($default);
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