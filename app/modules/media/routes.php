<?php 

Route::group(array('before' => 'auth'), function(){

	//display all media
	Route::any('admin/media','App\Modules\Media\MediaController@indexAction');//->before('media_manage_permission');
	//show media in modal
	Route::any('media/modal','App\Modules\Media\MediaController@modalAction');
	//create new media
	Route::any('admin/media/create', 'App\Modules\Media\MediaController@createAction');//->before('media_create_permission');
	//edit media files
	Route::any('admin/media/{id}/edit','App\Modules\Media\MediaController@editAction');//->before('media_edit_permission');
	//delete media files
	Route::any('admin/media/delete', 'App\Modules\Media\MediaController@deleteAction');//->before('media_delete_permission');
	//display file uploader
	Route::any('admin/media/uploader', 'App\Modules\Media\MediaController@uploaderAction');
	//show all media files in modal
	Route::any('media/library', 'App\Modules\Media\MediaController@libraryAction');
	//get attachment details
	Route::any('media/attachment','App\Modules\Media\MediaController@attachmentAction');
	//attach selected image to post
	Route::post('media/attach', 'App\Modules\Media\MediaController@attachAction');
	//delete attachment
	Route::post('admin/delete-attachment', function(){
		$postMeta 	= new PostMeta();
		$post_id 	= \Input::get('post_id');
		$postMeta->deletePostmeta($post_id, 'attachment');
		$postMeta->deletePostmeta($post_id, 'attachment_type');
		$postMeta->deletePostmeta($post_id, 'attachment_title');
		
	});


	Route::get('admin/post-attachment', function(){

		$post 		= new PPost();
		$postMeta   = new PostMeta();
		$post_id 	= \Input::get('post_id');

		$size 		= \Input::get('size');
		$attachment_obj = $postMeta->getPostMeta($post_id, 'attachment');
		$html 		= '';
			
		if($attachment_obj)
		{
			$html .= '<div class="panel__image">';

			$attachment = \Site::postFeatureMediaThumb($post->mediaAttachment($post_id, 'post-thumbnail'), 'thumbnail_medium');
			$html .= '<img src="'.$attachment.'">';

			$html .= '</div>';

			$html .= '<a href="#" class="panel__image-remove set-post-thumbnail">
									Remove feature media
								</a>';
		}
		else
		{
			$html .= '<div class="panel__image">';
			$html .= '</div>';
			$html		.= '<a href="#" class="set-post-thumbnail">
									Set feature media
								</a>';
		}

		
		echo $html;
		exit;
	
	});
});