<?php 
namespace App\Modules\User;

class CapabilityController extends \BaseController
{



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
				'capability' => 'required|unique:roles,capability',
			);
			$input = \Input::all();
			$validator = \Validator::make($input, $rules);

			if( $validator->passes() )
			{
				$affectedRows = \DB::table('roles')->insert(array('capability' => \Str::snake(trim($input['capability']))));
		

				if($affectedRows)
				{
					return \Redirect::to('admin/settings/user')
						->with('success_msg', 'Capability Successfully saved');
				}

			}
			else
			{
				return \Redirect::to('admin/members/capability/create')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}

		return \View::make('user::capability.create');
		
	}

	
	

	
}