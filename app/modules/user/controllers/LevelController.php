<?php 
namespace App\Modules\User;

class LevelController extends \BaseController
{

	/**
	 * Display Level lists
	 *@param none
	 *@return view
	 */
	public function indexAction()
	{
	
		$lists = new \LevelTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
			return \View::make('user::level.index')
				->with('lists', $lists);
		}
	}

	/**
	 * Display and save new level form
	 *@param none
	 *@return view
	 */

	public function createAction()
	{
	
		if(\Input::server('REQUEST_METHOD') == 'POST')
		{
			$rules = array(
				'name' 	=> 'required|unique:levels,name',
				'tsp' 	=> 'required|numeric',
				'months'=> 'required|numeric',
				'spend_per_order' => 'required|numeric',
				'earned'	=> 'required|numeric'
			);
			$input = \Input::all();
			$validator = \Validator::make($input, $rules);

			if( $validator->passes() )
			{
				$level = new \Level;
				$level->name 			= $input['name'];
				$level->tsp 			= $input['tsp'];
				$level->months 			= $input['months'];
				$level->spend_per_order = $input['spend_per_order'];
				$level->earned 			= $input['earned'];


				if($level->save())
				{
					return \Redirect::to('admin/members/levels')
						->with('success_msg', 'Successfully saved');
				}

			}
			else
			{
				return \Redirect::to('admin/members/level/create')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}

		return \View::make('user::level.create');
		
	}

	/**
	 * Display and save new level form
	 *@param none
	 *@return view
	 */

	public function deleteAction()
	{	

		$cid = \Input::get('cid');

		$affectedRows = \DB::table('levels')->whereIn('id', $cid)->delete();

		if( \Request::ajax() )
		{
		
			echo json_encode(array('status' => $affectedRows));
			exit;
		}
	}

	/**
	 * Display and save new level form
	 *@param none
	 *@return view
	 */

	public function editAction( $id )
	{	
		$arrLevel = [];
		$level = \Level::find($id);

		if(\Input::server('REQUEST_METHOD') == 'POST')
		{
			$rules = array(
				'name' 	=> 'required|unique:levels,name,'.$id,
				'tsp' 	=> 'required|numeric',
				'months'=> 'required|numeric',
				'spend_per_order' => 'required|numeric',
				'earned'	=> 'required|numeric'
			);
			$input 		= \Input::all();
			
			$arrLevel 	= $input;

			$validator 	= \Validator::make($input, $rules);

			if( $validator->passes() )
			{
				

				$level->name 			= $input['name'];
				$level->tsp 			= $input['tsp'];
				$level->months 			= $input['months'];
				$level->spend_per_order = $input['spend_per_order'];
				$level->earned 			= $input['earned'];

				if($level->save())
				{
					return \Redirect::to('admin/members/levels')
						->with('success_msg', 'Successfully saved');
				}

			}
			else
			{
				return \Redirect::to('admin/members/level/'.$id.'/edit')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}
		else
		{
			$arrLevel = $level->toArray();
		}

		return \View::make('user::level.edit')
			->with('level', $arrLevel);
		
	}
	

	
}