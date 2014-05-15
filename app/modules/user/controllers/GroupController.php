<?php 
namespace App\Modules\User;

class GroupController extends \BaseController
{

	/**
	 * Display group lists
	 *@param none
	 *@return view
	 */
	public function indexAction()
	{
	
		$lists = new \GroupTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
			return \View::make('user::group.index')
				->with('lists', $lists);
		}
	}

	/**
	 * Display and save new group form
	 *@param none
	 *@return view
	 */

	public function createAction()
	{
	
		if(\Input::server('REQUEST_METHOD') == 'POST')
		{
			$rules = array(
				'group' => 'required|unique:groups,group',
			);
			$input = \Input::all();
			$validator = \Validator::make($input, $rules);

			if( $validator->passes() )
			{
				$group = new \Group;
				$group->group = $input['group'];

				if($group->save())
				{
					return \Redirect::to('admin/members/groups')
						->with('success_msg', 'Successfully saved');
				}

			}
			else
			{
				return \Redirect::to('admin/members/group/create')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}

		return \View::make('user::group.create');
		
	}

	/**
	 * Display and save new group form
	 *@param none
	 *@return view
	 */

	public function deleteAction()
	{	

		$cid = \Input::get('cid');

		$affectedRows = \DB::table('groups')->whereIn('id', $cid)->delete();

		if( \Request::ajax() )
		{
		
			echo json_encode(array('status' => $affectedRows));
			exit;
		}
	}

	/**
	 * Display and save new group form
	 *@param none
	 *@return view
	 */

	public function editAction( $id )
	{	
		$arrGroup = "";
		$group = \Group::find($id);

		if(\Input::server('REQUEST_METHOD') == 'POST')
		{
			$rules = array(
				'group' => 'required|unique:groups,group,'.$id,
			);
			$input 		= \Input::all();
			
			$arrGroup 	= $input;

			$validator 	= \Validator::make($input, $rules);

			if( $validator->passes() )
			{
				

				$group->group = $input['group'];

				if($group->save())
				{
					return \Redirect::to('admin/members/groups')
						->with('success_msg', 'Successfully saved');
				}

			}
			else
			{
				return \Redirect::to('admin/members/group/'.$id.'/edit')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}
		else
		{
			$arrGroup = $group->toArray();
		}

		return \View::make('user::group.edit')
			->with('group', $arrGroup);
		
	}
	

	
}