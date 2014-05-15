<?php
namespace App\Modules\Comment;


class CommentController extends \BaseController
{
	public function indexAction()
	{
	
		$lists = new \CommentTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
		return \View::make('comment::index')
			->with('lists', $lists);
		}
	}
	
	

	public function editAction( $id )
	{


		
			
	}

	public function deleteAction()
	{
		$cid = \Input::get('cid');


		$affectedRows = \DB::table('posts_comments')->whereIn('id', $cid)->delete();


		echo json_encode(array('status' => $affectedRows));
		exit;
	}
}