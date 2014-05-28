<?php
namespace App\Modules\Banner;


class BannerController extends \BaseController
{
	public function indexAction()
	{
	
		$lists = new \BannerTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
		return \View::make('banner::index')
			->with('lists', $lists);
		}
	}
	
	
	public function createAction()
	{
		$input = array(
			'post_title' 		=> 'Draft',
			'guid' 				=> 'auto-draft-'.\PPost::where('guid', 'auto-draft')->count() + 1,
			'post_type'			=> 'banner',
			'post_date' 		=> date('Y-m-d H:i:s'),
			'post_status' 		=> 'auto-draft',
			'comment_status' 	=> 'open'
		);
		
		$post 	= new \PPost();
		
		$result = $post->savePost( $input );
		
		if($result['status'] == 'saved')
		{
			$post = $result['post'];
			
			return \Redirect::to('admin/banner/'.$post->id.'/edit');
		}
		
		
	}

	public function editAction( $id )
	{


		if(!$post = \PPost::find($id))
		{
			return \Redirect::to('admin/banner')
				->with('error_msg', "banner $id not found" );
		}

		
		$metas = $post->postmeta->toArray(); 
		
		
		$arrPost = $post->toArray();
		
		if( $_product = $post->product )
		{
			
			$arrPost = array_merge((array)$_product->toArray(), (array)$arrPost);//\Site::multiToSingleArr($_product->toArray(), $arrPost);
		}




		
		$arrPost['slug'] = \Site::postSlug($arrPost['guid']);
	

    	foreach($metas as $row)
    	{
    		$arrPost[$row['meta_key']] = $row['meta_value'];
    	}


    	$p = new \PPost;


    	$arrPost['post-thumbnail'] = \Site::postFeatureMediaThumb($p->mediaAttachment($id, 'post-thumbnail'), 'thumbnail_medium');

		if( \Input::server('REQUEST_METHOD') == 'POST' )
		{

			$input = \Input::all();

			$rules = array(
				'post_title'			=> 'required');
			
			$inputToValidate = $input;
	
            $validator = \Validator::make($inputToValidate, $rules);
            if( $validator->passes() )
            {
            	$input['id'] = $post->id;
            	$menu_order = 0;
            	if(isset($input['menu_order']) && $input['menu_order'] != '0-0' )
            	{

            		$menu_order = (int)$input['menu_order'] + 1;
            	}
            	
            	$input['menu_order'] = $menu_order;
				$result = $post->savePost( $input );

				if($result['status'] == 'saved')
				{
				
					
					$post = $result['post'];
					$metas = $input['meta'];
					$postmeta = new \PostMeta;

					$metas['banner_target'] = isset($metas['banner_target']) ? 1 : null;

					foreach($metas as $key => $val)
					{

						$postmeta->update_postmeta($post->id, $key, $val);
					}

			
					

					return \Redirect::to('admin/banner/'.$post->id.'/edit')
						->with('success_msg', 'Successfully saved!');


				}
				else
				{
					return \Redirect::to('admin/banner/'.$post->id.'/edit')
						->withInput($result['inputs'])
						->with('errors', $result['errors']);
				}
			}
			else
			{
				return \Redirect::to('admin/banner/'.$post->id.'/edit')
						->withInput()
						->with('errors', $validator->getMessageBag()->toArray());
			}
			
		}

		$terms = new \Terms;
		// $levels = \UserHelper::getAllLevels();
		//$comment = new \CommentHelper();
		
		$arrayOfTerms = $terms->getArrayTerms('banner-category');
		$post_terms = $terms->getArrayPostTermTaxonomyId($id);
		

		return \View::make('banner::edit')
			->with('post_terms', $post_terms)
			->with('terms', $arrayOfTerms)
			->with('post', $arrPost);
			// let ajax load the comments
			//->with('comment', $comment)
			
	}

	public function deleteAction()
	{
		$cid = \Input::get('cid');

		$meta = new \PostMeta;
		$arr = array();
		foreach( $cid as $id )
		{

			$meta_data = json_decode($meta->getPostMeta($id, 'attachment_metadata'));
			


			$files =& $meta_data->file;
			$sizes =& $meta_data->sizes;

			if($sizes)
			{
				foreach( $sizes as $key => $version)
				{
					$files[] = $version;
				}
			}


			$arr[] = $files;
		}



		$affectedRows = \DB::table('posts')->whereIn('id', $cid)->delete();

		if($affectedRows)
		{
			\DB::table('postmeta')->whereIn('post_id', $cid)->delete();

			if( $arr )
			{
				foreach($arr as $key => $val )
				{
					if( $val )
					{
						foreach($val as $file)
						{
							if(file_exists($file))
							{
						 		unlink($file);
						 	}
						}
					}
				}
			}
			
		}

		

		echo json_encode(array('status' => $affectedRows));
		exit;
	}
}