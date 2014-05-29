<?php
namespace App\Modules\Media;

class MediaController extends \BaseController
{

	public function createAction()
	{

		if( \Input::server('REQUEST_METHOD') == 'POST' )
		{
			$year 	= date('Y');
			$day 	= date('d');
			$media 	= 'media/uploads/'.$year.'/'.$day.'/';
	
			$options = array(
				'script_url' => \URL::to('admin/media/create'),
				'upload_dir' => $media,
            	'upload_url' => \URL::to('/').'/'.$media,
            	'image_versions' => array(
	                // Uncomment the following to create medium sized images:
	                'post-thumbnail' => array(
	                    'max_width' => 624,
	                    'max_height' => 390
	                ),
	                'large' => array(
	                    'max_width' => 1024,
	                    'max_height' => 640
	                ),
	                'listing-thumbnail' => array(
	                	'max_width' => 340,
	                	'max_height'	=> 195,
	                ),
	                'medium' => array(
	                    'max_width' => 800,
	                    'max_height' => 600
	                ),
	               'project_thumbnail' => array(
                		'crop' => true,
	                    'max_width' => 286,
	                    'max_height' => 105
	                ),
	                'thumbnail' => array(
	                    'max_width' => 80,
	                    'max_height' => 80
                	),

                ),
			);

			if(\Request::ajax())
			{
				$upload_handler = new \CustomUploadHandler($options);
				exit;
			}
			else
			{
				return \Redirect::to('admin/media/create')
					->with('success_msg', 'Media successfull saved');
					
			}

		}

	

		return \View::make('media::create');

	}

	public function indexAction()
	{
		$lists = new \MediaTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
		return \View::make('media::index')
			->with('lists', $lists);
		}
	}

	public function editAction( $id )
	{
		
		if(!$post = \PPost::find($id))
		{
			return \Redirect::to('admin/media')
				->with('error_msg', "Media with id #$id not found");
		}

		if( \Input::server('REQUEST_METHOD') == 'POST')
		{
			$input 	= \Input::all();
			$result = $post->savePost( $input );

			if($result['status'] == 'saved')
			{
				$post = $result['post'];

				
				$postmeta = new \PostMeta;
				$metas = $input['meta'];

				foreach($metas as $key => $val)
				{

					$postmeta->update_postmeta($post->id, $key, $val);
				}		
				
				if(\Request::ajax())
				{
					echo json_encode(array('status' => $result['status']));
					exit;
				}
				else
				{
					return \Redirect::to('admin/media/'.$post->id.'/edit')
						->with('success_msg', 'Successfully saved!');
				}


			}
			else
			{	
				if(\Request::ajax())
				{
					echo json_encode(array('status' => $result['status']));
					exit;
				}
				else
				{
					return \Redirect::to('admin/media/'.$post->id.'/edit')
						->withErrors($result['errors']);
				}
			}

		}

		$postmeta = new \PostMeta;
		$metas = $postmeta->getAllPostMeta($id);
		

		$arrPost = $post->toArray();


    	foreach($metas as $row)
    	{
    		$arrPost[$row['meta_key']] = $row['meta_value'];
    	}

    	$arrPost['post-thumbnail'] = $post->getAttachment($post->id, 'post-thumbnail');


		return \View::make('media::edit')
			->with('post', $arrPost);
	}
	public function modalAction()
	{
		if(\Request::ajax())
		{
			$html = \View::make('media::modal')->render();
			echo $html;

		}
		else
		{
			return \View::make('media::modal');
		}
	}

	public function deleteAction()
	{
		$cid = \Input::get('cid');

		$meta = new \PostMeta;
		$arr = array();
		foreach( $cid as $id )
		{
			$meta_data = json_decode($meta->getPostMeta($id, 'attachment_metadata'));
			$files[] =& $meta_data->file;
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

			foreach($arr as $key => $val )
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

		

		echo json_encode(array('status' => $affectedRows));
		exit;
	}

	public function uploaderAction()
	{
		return \View::make('media::uploader');
	}

	public function libraryAction()
	{
		//show number of media
		$per_row = 30;
		$postTotalAttachments = \Input::get('totalAttachments');
		$search 	=  \Input::get('s');
		$totalAttachments = isset($postTotalAttachments) ? $postTotalAttachments : $per_row;
		
		$page = $totalAttachments;
		
		$resultSet = \DB::table('posts')->where('post_type', '=', 'attachment')->orderby('post_date', 'desc');
		
		if($search)
		{

			$resultSet = $resultSet->where('post_title', 'like', '%'.$search.'%');
		}
		$resultSet = $resultSet->select('id', 'post_title', 'post_content', 'post_excerpt', 'post_date');
		
		$totalRows = $resultSet->count();
		// if($page <= $totalRows)
		// {
			$resultSet = $resultSet->skip($page)->take($per_row);
		// }
		
		$resultSet = $resultSet->remember(10)->get();
		
		
		$data = array();

		if($resultSet)
		{
			foreach($resultSet as $key => $val)
			{
				$arr = array();

				foreach($val as $k => $v)
				{
					$arr[$k] = $v;
				}

				
				$postmeta = new \PostMeta;


				$arr['meta_data'] = \Site::arrayCastRecursive(json_decode($postmeta->getPostMeta($val->id, 'attachment_metadata')));
				$arr['alt_text'] = $postmeta->getPostMeta($val->id, 'attachment_image_alt');

				$data[$key] = $arr;
			
			}
			
		}
	
		
		echo json_encode(array('row' => $data, 'totalRows' => $totalRows ));
		exit;

	}

	public function attachmentAction()
	{
		$data = \Input::get();

		return \View::make('media::attachment')
			->with('attachment', $data)
			->render();
	}

	public function attachAction()
	{
		$post_id 	= \Input::get('post_id');
		$title 	 	= \Input::get('title');
		$attachment = \Input::get('attachment');
		$type 		= \Input::get('type');
		
		$postmeta = new \PostMeta;
		if(isset($title))
		{
			$postmeta->update_postmeta($post_id, 'attachment_title', $title);
		}


		$postmeta->update_postmeta($post_id, 'attachment_type', $type);
		$postmeta->update_postmeta($post_id, 'attachment', $attachment);
	}
	
	
}