<?php 
namespace App\Modules\Widget;

class WidgetController extends \BaseController
{

	/**
	 * Display list of widget in a table 
	 * with search, filter and sorting
	 *
	 * @param none
	 * @return view
	 */

	public function indexAction()
	{
		


		if( \Input::server('REQUEST_METHOD') == 'POST' || \Input::get('action'))
		{
			$input = \Input::all();

			if($input['_token'] != csrf_token())
			{
				return \Redirect::to('admin/widget')
						->with('error_msg', 'Invalid token');
			}

			$post 		= new \PPost();
			$postmeta 	= new \PostMeta;
			$itemSaved  = false;
			
			//check if action is add-to-widget
			$action = $input['action'];
			if($action == 'add-to-widget')
			{
				
				if( !isset($input['widget']) || $input['widget'] == 0)
				{
					return \Redirect::to('admin/widget')
						->with('error_msg', 'No widget selected');
				}

				
				
				foreach($input as $indx => $arr)
				{	
					
					for($i = 1; $i <= count($arr); $i++)
					{


			

						//check if widget item is set
						$item_obj_Id 	= isset($arr['-'.$i]['_widget_item_object_id']) ? $arr['-'.$i]['_widget_item_object_id'] : null;
						$item_obj 		= isset($arr['-'.$i]['_widget_item_object']) ? $arr['-'.$i]['_widget_item_object'] : null;
						$item_type 		= isset($arr['-'.$i]['_widget_item_type']) ? $arr['-'.$i]['_widget_item_type'] : null;
						$item_title 	= isset($arr['-'.$i]['_widget_item_title']) ? $arr['-'.$i]['_widget_item_title'] : null;
						//$item_url 		= isset($arr['-'.$i]['_widget_item_url']) ? $arr['-'.$i]['_widget_item_url'] : null;
						$item_content 	= isset($arr['-'.$i]['_widget_item_description']) ? $arr['-'.$i]['_widget_item_description'] :null;
						
						$item = array(
							'post_status' 		=> 'draft',
							'post_parent' 		=> 0,
							'menu_level'  		=> 1,
							'menu_order'  		=> 0,
							'post_name'			=> $item_type == 'custom' ? $item_title : $item_obj_Id,
							'post_type' 		=> 'widget_item',
							'term_taxonomy_id' 	=> $input['widget'],
							'post_title' 		=> $item_type == 'custom' ? $item_title : null,
							'post_content'		=> $item_content,
							'meta'				=> array(
								'_widget_item_object_id' 	=> $item_obj_Id,
								'_widget_item_object'		=> $item_obj,
								'_widget_item_type'		=> $item_type,
								//'_widget_item_url'		=> $item_url != '#' && $item_url != '' ? \Site::addhttp($item_url) : '#',
							)
						);

					
						//check if there are widget item selected
						if( $item_type == 'custom' || $item_obj_Id != null )
						{
							$result = $post->savePost( $item );

							if($result['status'] == 'saved')
							{
						
								$post = $result['post'];
								$metas = $item['meta'];

								foreach($metas as $key => $val)
								{

									$postmeta->update_postmeta($post->id, $key, $val);
								}

								$itemSaved = true;
								//return \Redirect::to('admin/widget')
								//	->with('success_msg', 'Widget item successfully saved!');
							}
						}
						else
						{
							//return \Redirect::to('admin/widget')
							//		->with('error_msg', 'No Widget item selected!');
						}


					}

					

				}


				if($itemSaved == true)
				{
					return \Redirect::to('admin/widget?widget='.$input['widget'])
						->with('success_msg', 'Widget item successfully saved!');
				}
			}
			elseif($action == 'update')
			{


				//Check if set
				$term_taxonomy_id = isset($input['term_taxonomy_id']) ? $input['term_taxonomy_id'] : null;
				//Term name convert to slug
				$slug = \Str::slug($input['term_name']);
				//Check if slug is not exists
				$term = \Terms::where('slug', $slug);
				if(!$term_id = $term->pluck('term_id'))
				{
					$term = new \Terms;
					
					$data = array(
						'slug' => $slug,
						'name' => $input['term_name']
					);

					$term_id = $term->saveTerm($data);
				}
				else
				{
					

					$exists = \Taxonomy::where('term_id', $term_id)
							->where('term_taxonomy_id', '!=', $term_taxonomy_id)
							->where('taxonomy', 'widget')->count();

					if($exists)
					{
						return \Redirect::to('admin/widget')
						->with('error_msg', 'A term with the name provided already exists with this parent.');
					}
				}

				//Check if term_taxonomy_id is set
				if(!$term_taxonomy_id)
				{
					if($term_id)
					{
						
						//Save taxonomy if term_taxonomy_id is not exists
						$taxonomy  = new \Taxonomy;

						$taxonomy->term_id 		= $term_id;
						$taxonomy->taxonomy		= 'widget';
						$taxonomy->description	= '';
						$taxonomy->parent 		= 0;
						$taxonomy->count 		= 0;

						if($taxonomy->save())
						{
							$taxonomy_id = $taxonomy->term_taxonomy_id;
							return \Redirect::to('admin/widget?widget='.$taxonomy_id)
								->with('success_msg', 'Widget item successfully saved!');
						}

					}
				}


				if(isset($input['widget-item']))
				{

					foreach($input['widget-item'] as $indx => $arr)
					{
						$item_title 	= isset($arr['_widget_item_title']) ? $arr['_widget_item_title'] : null;
						$item_url 		= isset($arr['_widget_item_url']) ? $arr['_widget_item_url'] : null;
						$item_id 		= isset($arr['_widget_item_id']) ? $arr['_widget_item_id'] : null;
						$item_classes  	= isset($arr['_widget_item_classes']) ? $arr['_widget_item_classes'] :null;
						$item_content 	= isset($arr['_widget_item_description']) ? $arr['_widget_item_description'] :null;
						$item_target 	= isset($arr['_widget_item_target']) ? $arr['_widget_item_target'] :0;
						$item_level 	= isset($arr['_widget_item_level']) ? $arr['_widget_item_level'] :0;
						$item_order 	= isset($arr['_widget_item_order']) ? $arr['_widget_item_order'] :0;
						$item_title_attr = isset($arr['_widget_item_attr_title']) ? $arr['_widget_item_attr_title'] :0;
						$item_parent 	= isset($arr['_widget_item_parent']) ? $arr['_widget_item_parent'] :0;


						$item = array(
							'id'				=> $item_id,
							'post_status' 		=> 'publish',
							'post_parent' 		=> $item_parent,
							'post_content'		=> $item_content,
							'post_excerpt'		=> $item_title_attr,
							'menu_level'  		=> $item_level,
							'menu_order'  		=> $item_order,
							'term_taxonomy_id' 	=> $input['term_taxonomy_id'],
							'post_title' 		=> $item_title,
							'meta'				=> array(
								'_widget_item_classes'	=> serialize($item_classes),
								'_widget_item_target'		=> $item_target,
								'_widget_item_url'		=> $item_url == '#' ? $item_url :\Site::addhttp($item_url),
							)
						);



						$result = $post->savePost( $item );

						if($result['status'] == 'saved')
						{

							$post = $result['post'];
							$metas = $item['meta'];

							foreach($metas as $key => $val)
							{

								$postmeta->update_postmeta($post->id, $key, $val);
							}
							$itemSaved = true;
						}




					}
				}

				if($itemSaved == true)
				{
					return \Redirect::to('admin/widget?widget='.$input['term_taxonomy_id'])
						->with('success_msg', 'Widget item successfully saved!');
				}

			}
			elseif($action == 'move-down-widget-item')
			{
				$id = $input['widget-item'];

				if(!$post = \PPost::find($id))
				{
					return \Redirect::to('admin/widget')
						->with('error_msg', "Widget item with # $id is invalid");
				}

				$menu_order = $post->menu_order;
				$post->menu_order = $menu_order + 1;
				$post->save();
			}
			elseif($action == 'move-up-widget-item')
			{

				$id = $input['widget-item'];

				if(!$post = \PPost::find($id))
				{
					return \Redirect::to('admin/widget')
						->with('error_msg', "Widget item with # $id is invalid");
				}
				$menu_order = $post->menu_order;
				$post->menu_order = ($menu_order > 0) ? $menu_order - 1 : $menu_order;
				$post->save();
			}
			elseif($action == 'delete-widget-item')
			{

				$id = $input['widget-item'];
				$widget = $input['widget'];

				if(!$post = \PPost::find($id))
				{
					return \Redirect::to('admin/widget?widget='.$widget)
						->with('error_msg', "Widget item with # $id is invalid");
				}

				if($post->delete())
				{
					return \Redirect::to('admin/widget?widget='.$widget)
						->with('success_msg', 'Widget item successfully deleted');
				}
			}
			elseif($action == 'delete')
			{


				$term_taxonomy_id = $input['widget'];
				

				//Get instance of taxonomy by term_taxonomy_id
				if(!$taxonomy = \Taxonomy::find($term_taxonomy_id))
				{
					return \Redirect::to('admin/widget')
						->with('error_msg', "Widget item with # $term_taxonomy_id is invalid");
				}

				//Get widget item id
				$widget_items = \DB::table('term_relationships')
					->where('term_taxonomy_id', $term_taxonomy_id )
					->lists('object_id');

				\Terms::find($taxonomy->term_id)->delete();
				
				if($taxonomy->delete())
				{
					if($widget_items)
					{
						$is_deleted = \PPost::whereIn('id', $widget_items)->delete();
					}

					return \Redirect::to('admin/widget')
						->with('success_msg', 'Widget successfully deleted');
				}
				


			}

		}



		$widgets = \DB::table('terms')
			->join('term_taxonomy', 'terms.term_id', '=', 'term_taxonomy.term_id')
			->where('term_taxonomy.taxonomy', 'widget')
			->lists('name', 'term_taxonomy_id');

		$item_type = \DB::table('posts')
			->select('post_title', 'id', 'post_type')
			->where('post_status', 'publish')

			->whereNotIn('post_type', array('nav_widget_item', 'attachment'))->get();

		$posts = array();
		foreach($item_type as $type)
		{
			$posts[$type->post_type][$type->id] = $type->post_title;
		}

		$slcted_widget = \Input::get('widget');
		$slcted_widget = isset($slcted_widget) ? $slcted_widget : key($widgets);

		$item['widget'] 		= $slcted_widget;
		$item['widget_text']	= $slcted_widget == 0 ? '' : isset($widgets[$slcted_widget]) ? $widgets[$slcted_widget] : null;
		return \View::make('widget::index')
			->with('posts', $posts)
			->with('widgets', $widgets)
			->with('item', $item);
		
	}




}