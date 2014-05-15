<?php
namespace App\Modules\Settings;

class SettingsController extends \BaseController
{
	/**
	 * Display General Settings page
	 *@param none
	 *@return none
	 */
	public function getGeneral()
	{
        $timezones = tz_list();

		$dateFormats = array(
			'F j, Y' => date('F j, Y'), 
			'Y/m/d'	 => date('Y/m/d'),
			'm/d/Y'	 => date('m/d/Y'),
			'd/m/Y'	 => date('d/m/Y'),
			'custom' => 'Custom'
		);

		$timeFormats = array(
			'g:i a'  => date('g:i a'),
			'g:i A'  => date('g:i A'),
			'H:i'	 => date('H:i'),
			'custom' => 'Custom'
		);
	

		return \View::make('settings::site')
			->with('timezones', $timezones)
			->with('dateFormats', $dateFormats)
			->with('timeFormats', $timeFormats);
	}

    public function getContactInfo() {
        return \View::make('settings::contact_info');
    }
    public function getUserSecurity() {
        return \View::make('settings::user_security');
    }
    public function getTracking() {
        return \View::make('settings::trackings');
    }


    public function postGeneral() {
        $input = \Input::all();

        $input_toValidate = $input['option'];

        $rules = array(
            'admin_email' 		=> isset($input_toValidate['admin_email']) ? 'required|email' : '',
            'timezone_string'	=> isset($input_toValidate['timezone_string']) ? 'required': '',
            'date_format'		=> isset($input_toValidate['date_format']) ? 'required': '',
            'post_per_page'		=> isset($input_toValidate['post_per_page']) ? 'required|integer': ''
        );

        if(isset($input['date_format']) && $input['date_format'] == 'custom')
        {
            $rules['date_format_custom'] = 'required';
        }

        if(isset($input['time_format']) && $input['time_format']  == 'custom')
        {
            $rules['time_format_custom'] = 'required';
        }


        $validator = \Validator::make($input_toValidate, $rules);

        if( $validator->passes() )
        {
            $settings = new \Settings;

            foreach($input['option'] as $option_name => $option_value)
            {
                $settings->saveSettings($option_name, $option_value);
            }


            if (\Input::has('success_url')) {
                return \Redirect::to(\Input::get('success_url'))
                    ->with('success_msg', 'Settings successfully saved');
            } else {
                return \Redirect::to('admin/settings/general')
                    ->with('success_msg', 'Settings successfully saved');

            }

        }
        else
        {

            return \Redirect::to('admin/settings/general')
                ->withInput()
                ->with('errors', $validator->getMessageBag()->toArray());
        }
    }



	/**
	 * Display User Settings page
	 *@param none
	 *@return none
	 */
	public function userAction()
	{

		if( \Input::server('REQUEST_METHOD') == 'POST' )
		{
			$input = \Input::all();

			if( isset($input['submit']) && $input['submit'] === 'save' )
			{
				$rules = array(
					'group' 		=> 'required|exists:groups,id',
					'capability' 	=> 'required'
				);
				
				$validator = \Validator::make($input, $rules);

				if( $validator->passes()  )
				{
					$groups_caps = array();
					foreach($input['capability'] as $cap)
					{
						$groups_caps[] = array('group_id' => $input['group'], 'role_id' => $cap );
					}

					//Delete groups_roles by group id
					\DB::table('groups_roles')
						->where('group_id', $input['group'])
						->delete();
					//save group capabilities	
					$affectedRows = \DB::table('groups_roles')->insert( $groups_caps );
					
					if($affectedRows)
					{
						return \Redirect::to('admin/settings/user')
							->withInput()
							->with('success_msg', 'User capabilities successfully saved');
					}
				}
				else
				{
					return \Redirect::to('admin/settings/user')
							->with('errors', $validator->getMessageBag()->toArray());
				}
			}

		}

		//Get all groups
		$groups 		=  \Group::all()->lists('group', 'id');


		$group_id = \Input::get('group') ? \Input::get('group') : key($groups);

		//Get existing group capabilities
		$exists_caps 	= \DB::table('groups_roles')->where('group_id', $group_id)->lists('role_id');
		//Get all capabilities
		$capabilities 	= \DB::table('roles')->select('capability', 'id')->get();

		return \View::make('settings::user')
			->with('exists_caps', $exists_caps)
			->with('groups', $groups)
			->with('capabilities', $capabilities);
	}

}