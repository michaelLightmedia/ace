<?php 
namespace App\Modules\User;
// import the Intervention Image Class
use Intervention\Image\Image;
use Input, Illuminate\Support\MessageBag, Validator, Redirect, Auth, Hash;
use User, UserMeta;



class UserController extends \Controller
{

	public $layout = 'layouts.front';
	/*---------------------------------------------
	 	DISPLAY OF USER/MEMBER AUTHENTICATIONS
	 -----------------------------------------------*/
	/**
	 * Login action
	 * 
	 * @param none
	 * @return object
	 */
	public function loginAction()
	{

		if( Input::server('REQUEST_METHOD') == 'POST' )
		{

			$rules = array(
					'email' 	=> 'login_email',
					);

			$input = Input::all();

			$returURL = (isset($input['returnUrl'])) ? $input['returnUrl'] : null;

			$validator = Validator::make($input, $rules);

            if ( is_locked_out_user( \Input::get("email") ) ) {
                $returURL = ($returURL) ? $returURL :'login';
                return Redirect::to($returURL);
            }

			if($validator->passes())
			{

				$credentials = array(
					'email' 	=> Input::get('email'),
					'password'	=> Input::get('password'),
                  // 'active' => 1 // allowed inactive or active user to login
				);

				if(Auth::attempt($credentials, Input::get('remember')))
				{
					//Get User timezone
					$offset = \UserMeta::get(\Auth::User()->id, 'timezoneOffset');
					//Check if has offset
					if( $offset )
					{
						//Save offset in timezone
						\Session::put('timezoneOffset', $offset);
					}

                    lock_out_remove(\Input::get('email'));

					//Check if request is via ajax
					if(\Request::ajax())
					{
						return array('status' => 'success');
						die;
					}
					else
					{
						$userGroup = Auth::user()->group->group;

						$returURL = $returURL = ($returURL) ? $returURL : 'admin/dashboard'; 
							
						return Redirect::to($returURL);	
					}
				}
				else
				{
                    lock_out_user( \Input::get('email') );

					//Check if request is via ajax
					if(\Request::ajax())
					{
						echo json_encode(array('errors' => \Lang::get('validation.custom.login_invalid_email_or_password')));
						die;
					}
					else
					{
						$returURL = ($returURL) ? $returURL :'login';
						return Redirect::to($returURL)
						->withInput()
						->with('error_msg', \Lang::get('validation.custom.login_invalid_email_or_password') );
					}
				}

			}
			else
			{
                lock_out_user( \Input::get('email') );

                \Session::flash('error_msg','All fields are mandatory. ');

				// $data['errors'] 	= new MessageBag(['password' => [\Lang::get('validation.custom.login_invalid_email_or_password')]]);
				// $data['username']	= Input::get('username');

				//Check if request is via ajax
				if(\Request::ajax())
				{
					echo json_encode(array('errors' => $validator->getMessageBag()->toArray()));
					die;
				}
				else
				{
					$returURL = ($returURL) ? $returURL :'login';
					return Redirect::to($returURL)
							->withInput()
							->with('errors', $validator->getMessageBag()->toArray());
				}
			}
		}

		return \View::make('user::auth.login')
		->with('title', \Lang::get('messages.login_tab_title'));
	}

	/**
	 * Import user in csv file
	 * 
	 * @param none
	 * @return none
	 */

	public function importAction()
	{	


		if( Input::hasFile('csv') )
		{

			$csv = Input::file('csv');
			$flag = true;

			$header = array();
			$error_msg = '';
			$success_msg = '';
			$items = array();
			$row = 1;
			

			if( ($handle = fopen($csv, "r")) !== FALSE)
			{
				while( ( $data = fgetcsv($handle, 1000, ",") ) !== FALSE  )
				{
					$input = array();

					if( $flag )
					{
						$num = count( $data );
						for( $i = 0; $i < $num; $i++ )
						{
							$header[] = \Str::slug($data[$i]);
						}
					}
					else
					{
						for( $i = 0; $i < $num; $i++ )
						{
							$input[$header[$i]] = $data[$i];
						}

					}


					
			

					if( !$flag )
					{	
							$rules = array(
								'username' 			=> 'required|min:5|unique:users',
								'email'				=> 'required|email|unique:users',
								'password'			=> 'required|min:6',
								'firstname' 		=> 'required',
								'lastname'			=> 'required',
							);

							$validator = \Validator::make($input, $rules);

							if( $validator->passes() )
							{

								$items[] = array(
									"username"		=> $input['username'],
									"email" 		=> $input['email'],
									"password" 		=> $input['password'],
									"firstname" 	=> $input['firstname'],
									"lastname" 		=> $input['lastname'],
									"gender" 		=> $input['gender'],
									"birthdate" 	=> $input['birthdate'],
									"address_1" 	=> $input['address-1'],
									"address_2" 	=> $input['address-2'],
									"state" 		=> $input['state'],
									"postcode" 		=> $input['postcode'],
									"country" 		=> $input['country-code'],
									"mobile" 		=> $input['phone'],
									"nric" 			=> $input['nric'],
									"group_id"		=> \Settings::get('default_role'),
									"level_id"		=> \Settings::get('default_level'),
									"created_at"	=> date('Y-m-d'),
									"updated_at"	=> date('Y-m-d'),
									"active" 		=> 0);
							}
							else
							{
								$errors = $validator->getMessageBag()->toArray();

								foreach( $errors as $k => $errs )
								{
									foreach($errs as $err)
									{
										$error_msg .= 'row #'.$row.' '.$err.'<br />';
									}
								}

							}

					}


					if( $flag )
					{
						$flag = false;
					}
					
					$row++;
				}
			}

			$result = Redirect::to('admin/members');
			if( count($items) > 0 )
			{

				if( \DB::table('users')->insert( $items ) )
				{
					$success_msg = 'Successfully saved.';

					$result = $result->with('success_msg', $success_msg);
				}
			}

			if( $error_msg != '' )
			{
				$result = $result->with('error_msg', $error_msg);
			}
		}
		else
		{
			return Redirect::to('admin/members')->with('error_msg', 'CSV file is required');
		}

		return Redirect::to('admin/members');

	}

	/**
	 * Logout action
	 * 
	 * @param none
	 * @return route
	 */
	public function logoutAction()
	{
        if (\Input::get('_token') != \Session::get('_token')){
            \App::abort('403');
        }

        if (\Input::has('is_expired') && \Input::get('is_expired') == 1) {
            \Session::flash('error_msg','Your session has expired. Please login again to continue.');
        }

        // Logout
        \Auth::logout();

        return \Redirect::to("/login");
	}

	/**
	 * Request for password
	 * 
	 * @param none
	 * @return object
	 */

	public function requestAction()
    {
        $data = array(
            "requested" => Input::old("requested")
        );

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), array(
                "email" => "required|exists:users"
            ));

            if ($validator->passes())
            {
                $credentials = array(
                    "email" => Input::get("email")
                );

                \Password::remind($credentials,
                    function($message, $user)
                    {
                    	$message->subject('Password Reminder');
                        $message->from(\Settings::get('admin_email'));
                    }
                );

                $data["requested"] = true;

                return Redirect::route("user/request")
                	->with('success_msg', 'Reset email successfully sent.')
                    ->withInput($data);
            }

           	return Redirect::route('user/request')->withInput()->with('errors', $validator->getMessageBag()->toArray());
        }

        return \View::make("user::auth.request", $data)
        	->with('title', \Lang::get('messages.pwd_req_tab_title'));
    }

    /**
	 * Resetting password
	 * 
	 * @param none
	 * @return object
	 */

	public function resetAction()
    {
        $token = "?token=" . Input::get("token");

        $errors = new MessageBag();

        if ($old = Input::old("errors"))
        {
            $errors = $old;
        }

        $data = array(
            "token"  => $token,
            "errors" => $errors
        );

        if (Input::server("REQUEST_METHOD") == "POST")
        {
            $validator = Validator::make(Input::all(), array(
                "email"                 => "required|email",
                "password"              => "required|min:6",
                "password_confirmation" => "required|same:password",
                "token"                 => "required|exists:password_reminders,token"
            ));

            if ($validator->passes())
            {
                $credentials = array(
                    "email" => Input::get("email")
                );

                return \Password::reset($credentials,
                    function($user, $password)
                    {

                        $user->password = Hash::make($password);
                        $user->save();

                        //Auth::login($user);        

                        return Redirect::to("login");
                    }
                );
            }

            $data["email"]  = Input::get("email");
            $data["errors"] = $validator->errors();

            return Redirect::to(\URL::route("user/reset") . $token)
            	->withInput()
                ->with('errors', $validator->getMessageBag()->toArray());
        }

        return \View::make("user::auth.reset", $data)
        	->with('title', 'Reset Password');
    }


    public function activeAction()
    {

    	$code = Input::get('code');

    	$result = \DB::table('users')
    				->where('activation_code', $code)
    				->update(array('active' => 1, 'activation_code' => null));

    	if( $result )
    	{
    		return Redirect::route('login')
					->with('title', 'Login')
					->with('success_msg', \Lang::get('messages.signup_acnt_activated'));
					exit;
    	}

    	return Redirect::route('login')
					->with('title', 'Login')
					->with('error_msg', \Lang::get('validation.custom.signup_invalid_code'));
					exit;

    }

    /**
	 * Registration
	 * 
	 * @param none
	 * @return object
	 */
	public function getSignup()
	{
		return \View::make('user::auth.signup');
	}

    public function postSignup() {

            $input 		= Input::all();
            $returnUrl 	= isset($input['returnUrl']) ? $input['returnUrl'] : null ;

            $rules = array(
                'email'				=> 'required|email|unique:users',
                'password'			    => 'password|required',
                'password_confirmation' 	=> 'same:password|required',
                'firstname'			=> 'required',
                'lastname'			=> 'required',
                'terms_&_conditions' => 'terms_condition|required',
                'security_q'        => 'required|in:question_1,question_2',
                'security_q_answer' => 'required|max:1000'
            );

            $validator = \Validator::make($input, $rules);

            if($validator->passes())
            {
                $password 	= Hash::make(Input::get('password'));
                $email 		= Input::get('email');
                $code = generate_token();

                $user = new User();
                $user->email 		= $email;
                $user->password 	= $password;
                $user->firstname 	= $input['firstname'];
                $user->lastname 	= $input['lastname'];
                $user->activation_code  = $code;
                $user->active 		= 0;
                $user->group_id 	= \Settings::get('default_role');

                if($user->save())
                {
                    $user->createMeta('security_q',Input::get('security_q'));
                    $user->createMeta('security_q_answer',Input::get('security_q'));
                    $user->createMeta('terms_&_conditions',Input::get('terms_&_conditions'));


                    $user = array(
                        'email' => $email,
                        'name' => $input['firstname'] . "" . $input['lastname'],
                    );

                    $data = array(
                        'name'			=> $user['name'],
                        'code' 			=> urlencode($code),
                        'customer_name'	=> $input['firstname'] .' '.$input['lastname'],
                        'customer_email' => $email
                    );

                    //Send email
                    \Mail::send('user::emails.register',$data, function($message) use ($user){
                        $message->to($user['email'], $user['name'])->subject('Welcome to Ace');
                    });

                    //Send email notification to administrator for new user registration
                    \Mail::send('user::emails.new_user_notification',$data, function($message) {
                        $message->to(\Settings::get('order_recipient_email'), \Settings::get('order_recipient_name'))->subject('New User Registered!');
                    });


                    //Check if request is ajax
                    if( \Request::ajax() )
                    {
                        \Session::flash('success_msg', 'Please check your email to activate your account.');

                        echo json_encode(array('status' => 'success', 'message' => 'Please check your email to activate your account.'));
                        exit;

                    }

                    else
                    {
                        $returnUrl = $returnUrl ? $returnUrl : 'login';
                        return Redirect::to($returnUrl)
                            ->with('success_msg', \Lang::get('messages.signup_activate_accnt'));
                    }
                }
                else
                {
                    //Check if request is ajax
                    if( \Request::ajax() )
                    {
                        echo json_encode(array('status' => 'failed', 'errors' => 'Unable to process your request, please check your data.'));
                        exit;
                    }
                    else
                    {
                        return Redirect::to('signup')
                            ->with('error_msg', 'Unable to process your request, please check your data.');
                    }
                }
            }
            else
            {

                //Check if request is ajax
                if( \Request::ajax() )
                {
                    echo json_encode(array('status' => 'failed', 'errors' => $validator->getMessageBag()->toArray()));
                    exit;
                }
                else
                {
                    return Redirect::to('signup')
                        ->withInput()
                        ->with('errors', $validator->getMessageBag()->toArray());
                }
            }
    }





	/*---------------------------------------------
	 	DISPLAY OF USER/MEMBER FUNCTIONS
	 -----------------------------------------------*/


	

	/**
	 * Show all members
	 * 
	 * @param id
	 * @return none
	 */

	public function indexAction()
	{

		$users 		= User::all();
	
		$lists = new \UserTable();

		if(\Request::ajax())
		{

			$html = $lists->ajaxTableHelper($lists);

			echo json_encode($html);
			exit;
		}
		else
		{
			return \View::make('user::user.index')
				->with('users', $users)
				->with('lists', $lists);
		}
	}

	/**
	 * Creaet new user
	 * 
	 * @param none
	 * @return none
	 */
	
	public function createAction()
	{

		
		//$tab = \Input::get('tab');
		//$tab = (isset($tab)) ? $tab : 'member-details';


		$user = new User;
		$user->created_at 	= date('Y-m-d H:i:s');
		$user->group_id 	= (\Settings::get('default_role')) ? \Settings::get('default_role') :\DB::table('groups')->where('group', 'Customer')->pluck('id');
		$user->active = 0;
		

		if( Input::server('REQUEST_METHOD') == 'POST' )
		{

			$input = \Input::all();
			
			
			// if( $tab == 'member-details' )
			// {			
				$rules = array(
					'email'			=> 'required|email|unique:users,email,'.$user->id,
					'firstname' 		=> 'required',
					'lastname' 			=> 'required',
					//'avatar' 			=> 'image|max:2000',
				);


				if( Input::hasFile('avatar') )
				{
					$extension = Input::file('avatar')->getClientOriginalExtension();

					if( !in_array( strtolower($extension), array("png", "jpg", "jpeg", "gif") ) )
					{
						return \Redirect::to('admin/member/create?tab='.$tab)
							->with('error_msg', 'Invalid file extension');
					}
				}
				
				$password 			= $input['password'];	
				$user->email 		= $input['email'];
				$user->firstname 	= $input['firstname'];
				$user->lastname 	= $input['lastname'];
				$user->birthdate 	= $input['birthdate'];
				$user->points 		= 0;
				$user->group_id 	= $input['group_id'];
				$user->active 		= $input['active'];
				// $user->nric 		= $input['nric'];
				
				if( isset($input['password']) && $input['password'] != '' )
				{
					$rules['password'] 			= 'required|min:5';
					$rules['confirm_password']	= 'required|same:password';
				}
				if(trim($password) != '')
				{
					$password 		= Hash::make($password);
					$user->password = $password;
				}
			// }
			// elseif( $tab == 'contact-details' )
			// {
			// 	$rules = array(
			// 		'email'				=> 'required|email|unique:users,email,'.$user->id,
			// 		'birthdate' 		=> 'date',
			// 		'address_1' 		=> 'required',
			// 		'state' 			=> 'required',
			// 		'postcode'			=> 'required',
			// 		'country'			=> 'required',
			// 	);
			// 	$email 				= $input['email'];
			// 	$user->email 		= $email;
			// 	$user->address_1 	= $input['address_1'];
			// 	$user->address_2 	= $input['address_2'];
			// 	$user->postcode 	= $input['postcode'];
			// 	$user->state 		= $input['state'];
			// 	$user->country 		= $input['country'];
			// 	$user->mobile 		= $input['mobile'];
			// }


			$validator = Validator::make($input, $rules);

			if( $validator->passes() )
			{

				$user->updated_at 	= date('Y-m-d H:i:s');
				

				if( Input::hasFile('avatar') )
				{

					$path 	= 'media/uploads/users/'.$user->id.'/avatar';

					if(\File::exists($path))
					{
						\File::deleteDirectory($path);
					}

					$img 	= Input::file('avatar');
					$extsn 	= $img->getClientOriginalExtension();

					$avatar = $path.'/avatar';

					$user->avatar = $avatar.'.'.$extsn;

				}

				

				if( $user->save() )
				{

					if( Input::hasFile('avatar') )
					{
						$uploadSuccess = $img->move($path, 'avatar.'.$extsn);

						if( $uploadSuccess ) 
						{
							Image::make($avatar.'.'.$extsn)
							 	->resize(40, 40)
							 	->save($avatar.'40x40.'.$extsn);

							Image::make($avatar.'.'.$extsn)
							 	->resize(87, 87)
							 	->save($avatar.'87x87.'.$extsn);

							unset($img);

					        return Redirect::to('admin/member/'.$user->id.'/edit/membership')
									->withInput()
									->with('success_msg', 'User successfully saved');
				        }
					}

					$user['id'] = $user->id;

					return Redirect::to('admin/member/'.$user['id'].'/edit/membership')
						->withInput()
						->with('success_msg', 'User successfully saved');

				}
				else
				{
					return Redirect::to('admin/member/create')
						->withInput()
						->with('error_msg', 'Unable to save the data');
				}

			}
			else
			{
				return Redirect::to('admin/member/create')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}

			$user = $input;

		}

		$user['tab'] = 'member-details';

		$groups = new \Group;
		$groupObj = $groups->lists();
		$groupArr = array();

		foreach($groupObj as $group)
		{
			$groupArr[$group->id] = $group->group;
		}
		
		return  \View::make('user::user.create')
					->with('user', $user)
					->with('groups', $groupArr);
	}
	


	public function deleteAction()
	{
	
		if(\Request::ajax())
		{
			$cid = Input::get('cid');
			

			$queryResult = \DB::table('users')->whereIn( 'id', $cid )->delete();



			echo json_encode($cid);
			exit;
		}
		else
		{
			$id = \Input::get('id');
			$affectedRow = \User::find($id)->delete();
			
			return $affectedRow;
		}
	}

	public function activateAction()
	{

		if(\Request::ajax())
		{
			$cid 	= Input::get('cid');
			$status	= Input::get('status');

			$queryResult = \DB::table('users')->whereIn( 'id', $cid )->update(array('active' => $status));

			echo json_encode($cid);
			exit;
		}
		else
		{
			$id = \Input::get('id');
			$affectedRow = \User::find($id)->delete();
			
			return $affectedRow;
		}
	}


	/**
	 * Display current adminsitrator login profile page
	 *
	 *@param none
	 *@return none
	 */
	public function profileAction()
	{

		$user_id = \Auth::User()->id;
		$user = \User::find( $user_id );


		if(\Input::server('REQUEST_METHOD') == 'POST')
		{

			$input = \Input::all();

			$rules = array(
					'email'				=> 'required|email',//|unique:users,email,'.$id,
					'firstname' 		=> 'required',
					'lastname' 			=> 'required',
					'email' 			=> 'required|unique:users,email,'.$user_id,
					'password2'			=> 'same:password',
					'avatar' 			=> 'image|max:2000',
				);

			if( Input::hasFile('avatar') )
			{
				$extension = Input::file('avatar')->getClientOriginalExtension();

				if( !in_array( strtolower($extension), array("png", "jpg", "jpeg", "gif") ) )
				{
					return \Redirect::to('admin/profile')
						->with('error_msg', 'Invalid file extension');
				}
			}

			$validator = Validator::make($input, $rules);
			
			if( $validator->passes() )
			{

				if(isset($input['password']) && trim($input['password']) != '')
				{

					$user->password 	= Hash::make($input['password']);
				}

				if( Input::hasFile('avatar') )
				{

					$path 	= 'media/uploads/users/'.$user_id.'/avatar';

					if(\File::exists($path))
					{
						\File::deleteDirectory($path);
					}

					$img 	= Input::file('avatar');
					$extsn 	= $img->getClientOriginalExtension();

					$avatar = $path.'/avatar';

					$user->avatar = $avatar.'.'.$extsn;

				}



				$user->email 		= $input['email'];
				$user->firstname 	= $input['firstname'];
				$user->lastname 	= $input['lastname'];

				if($user->save())
				{
					if( Input::hasFile('avatar') )
					{
						
						$uploadSuccess = $img->move($path, 'avatar.'.$extsn);
						

						if( $uploadSuccess ) 
						{
							Image::make($avatar.'.'.$extsn)
							 	->resize(40, 40)
							 	->save($avatar.'40x40.'.$extsn);

							Image::make($avatar.'.'.$extsn)
							 	->resize(87, 87)
							 	->save($avatar.'87x87.'.$extsn);

							unset($img);
				        }
				    	
					}

					return \Redirect::to('admin/profile')
 					->with('success_msg', 'Profile successfully saved');
				}
				else
				{
					return \Redirect::to('admin/profile')
 					->with('error_msg', 'Unable to save profile');
				}
 			}
 			else
 			{
 				return \Redirect::to('admin/profile')
 					->with('errors', $validator->getMessageBag()->toArray());
 			}
		}
		else
		{
			$user 	= $user->toArray();
		}


		return \View::make('user::user.profile')
			->with('user', $user);
	}







	/*---------------------------------------------
        LIST OF CUSTOMER ACTION
     -----------------------------------------------*/
    /**
	 * Display current customer membership
	 *
	 *@param none
	 *@return none
	 */
    public function customerMembershipAction()
    {
    	$user_id = \Auth::User()->id;
		$user = \User::find( $user_id );

		if( \Input::server('REQUEST_METHOD') == 'POST' )
		{
			$input = \Input::all();

			$rules = array(
				'username' => 'required|unique:users,username,'.\Auth::User()->id,
				'firstname'	=> 'required',
				'lastname'	=> 'required',
				'password2' => 'same:password',
				//'avatar'	=> 'image|max:2000'
			);
			

			if( Input::hasFile('avatar') )
			{
				$extension = Input::file('avatar')->getClientOriginalExtension();

				if( !in_array( strtolower($extension), array("png", "jpg", "jpeg", "gif") ) )
				{
					return \Redirect::to('customer/profile/membership')
						->with('error_msg', 'Invalid file extension');
				}
			}

			if( isset($input['password']) )
			{
				$rules['password'] 	= 'min:5';
				$password 		= Hash::make($input['password']);
				$user->password = $password;

			}

			$validator = \Validator::make($input, $rules);
			if( $validator->passes() )
			{
				$user->username 	= $input['username'];
				$user->firstname 	= $input['firstname'];
				$user->lastname 	= $input['lastname'];
				$user->nric 		= $input['nric'];
				$user->gender 		= $input['gender'];
				$user->birthdate 	= date('Y-m-d', strtotime($input['birthdate']));
				

				if( Input::hasFile('avatar') )
				{
					$path 	= 'media/uploads/users/'.$user_id.'/avatar';

					if(\File::exists($path))
					{
						\File::deleteDirectory($path);
					}

					$img 	= Input::file('avatar');
					$extsn 	= $img->getClientOriginalExtension();

					$avatar = $path.'/avatar';

					$user->avatar = $avatar.'.'.$extsn;

				}


				if($user->save())
				{

					if( Input::hasFile('avatar') )
					{
						
						$uploadSuccess = $img->move($path, 'avatar.'.$extsn);
						

						if( $uploadSuccess ) 
						{
							Image::make($avatar.'.'.$extsn)
							 	->resize(40, 40)
							 	->save($avatar.'40x40.'.$extsn);

							Image::make($avatar.'.'.$extsn)
							 	->resize(87, 87)
							 	->save($avatar.'87x87.'.$extsn);

							unset($img);



					    //     return Redirect::to('admin/member/'.$user->id.'/edit/membership')
									// ->withInput()
									// ->with('success_msg', \Lang::get('messages.saved'));
				        }
				    	
					}
					
					return \Redirect::to('customer/profile/membership')
						->with('success_msg', 'Record successfully saved');
				}
				else
				{
					return \Redirect::to('customer/profile/membership')
						->with('error_msg', 'Unable to save membership info.');
				}
			}
			else
			{
				return \Redirect::to('customer/profile/membership')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}
		else
		{
			$user 	= $user->toArray();
		}
    	return \View::make('user::customer.membership')
    		->with('user', $user);
    }

    /**
	 * Display current customer details
	 *
	 *@param none
	 *@return none
	 */

    public function customerDetailsAction()
    {
    	$user_id = \Auth::User()->id;
		$user = \User::find( $user_id );

		if( \Input::server('REQUEST_METHOD') == 'POST' )
		{
			$input = \Input::all();
			$returnUrl = isset($input['returnUrl']) ? $input['returnUrl'] : null;
			$rules = array(
				'email' 	=> 'required|unique:users,email,'.\Auth::User()->id,
				'mobile'	=> 'required',
				'address_1'	=> 'required',
			);


			$validator = \Validator::make($input, $rules);
			if( $validator->passes() )
			{
				$user->email 		= $input['email'];
				$user->mobile 		= $input['mobile'];
				$user->address_1 	= $input['address_1'];
				$user->address_2 	= $input['address_2'];
				$user->state 		= $input['state'];
				$user->postcode 	= $input['postcode'];
				$user->country 		= $input['country'];
				
				if($user->save())
				{
					$returnUrl = (isset($returnUrl)) ? $returnUrl : 'customer/profile/contact-details';
					
					return Redirect::to($returnUrl)
						->with('success_msg', 'Record successfully saved');
				}
				else
				{
					$returnUrl = (isset($returnUrl)) ? $returnUrl : 'customer/profile/contact-details';
					
					return Redirect::to($returnUrl)
						->with('error_msg', 'Unable to save contact details');
				}
			}
			else
			{
				$returnUrl = (isset($returnUrl)) ? $returnUrl : 'customer/profile/contact-details';
					
				return Redirect::to($returnUrl)
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());
			}
		}
		else
		{
			$user 	= $user->toArray();
		}

    	return \View::make('user::customer.contact-details')
    		->with('user', $user);
    }
















    /**-------------------------------------------------
     * Admin customer Action
     *--------------------------------------------------*/


    public function userMembershipAction( $id )
    {

    	if(!$user = User::find($id))
		{
			$user = new User();
		}

    	if( Input::server('REQUEST_METHOD') == 'POST' )
		{
			
			$input = \Input::all();

			$rules = array(
				'email'			=> 'required|unique:users,email,'.$id,
				'firstname' 		=> 'required',
				'lastname' 			=> 'required',
				//'avatar' 			=> 'image|max:2000',
				'group_id'			=> 'exists:groups,id'
			);

			if( Input::hasFile('avatar') )
			{
				$extension = Input::file('avatar')->getClientOriginalExtension();

				if( !in_array( strtolower($extension), array("png", "jpg", "jpeg", "gif") ) )
				{
					return \Redirect::to('admin/member/'.$id.'/edit/membership')
						->with('error_msg', 'Invalid file extension');
				}
			}
			
			
			$validator = Validator::make($input, $rules);
			
			if( $validator->passes() )
			{
				$password 			= $input['password'];	
				$user->email 	= $input['email'];
				$user->firstname 	= $input['firstname'];
				$user->lastname 	= $input['lastname'];
				$user->birthdate 	= date('Y-m-d', strtotime($input['birthdate']));
				$user->group_id 	= $input['group_id'];
				$user->active 		= $input['active'];
				
				if( isset($input['password']) && $input['password'] != '' )
				{
					$rules['password'] 			= 'required|min:5';
					$rules['confirm_password']	= 'required|same:password';
				}
				if(trim($password) != '')
				{
					$password 		= Hash::make($password);
					$user->password = $password;
				}
 				
				$user->updated_at 	= date('Y-m-d H:i:s');
				
				
				
				if( Input::hasFile('avatar') )
				{
					$path 	= 'media/uploads/users/'.$id.'/avatar';

					if(\File::exists($path))
					{
						\File::deleteDirectory($path);
					}

					$img 	= Input::file('avatar');
					$extsn 	= $img->getClientOriginalExtension();

					$avatar = $path.'/avatar';

					$user->avatar = $avatar.'.'.$extsn;

				}

				

				if( $user->save() )
				{
				
					
					
					if( Input::hasFile('avatar') )
					{
						
						$uploadSuccess = $img->move($path, 'avatar.'.$extsn);
						

						if( $uploadSuccess ) 
						{
							Image::make($avatar.'.'.$extsn)
							 	->resize(40, 40)
							 	->save($avatar.'40x40.'.$extsn);

							Image::make($avatar.'.'.$extsn)
							 	->resize(87, 87)
							 	->save($avatar.'87x87.'.$extsn);

							unset($img);



					    //     return Redirect::to('admin/member/'.$user->id.'/edit/membership')
									// ->withInput()
									// ->with('success_msg', \Lang::get('messages.saved'));
				        }
				    	
					}

					
					$user['id'] = $user->id;


					
					
					return Redirect::to('admin/member/'.$user['id'].'/edit/membership')
						->withInput()
						->with('success_msg', \Lang::get('messages.saved'));
					

				
				}
				else
				{
	
					
					return Redirect::to('admin/member/'.$id.'/edit/membership')
						->withInput()
						->with('error_msg', 'Unable to save the data');
				}


				

				

			}
			else
			{
				return Redirect::to('admin/member/'.$id.'/edit/membership')
				->withInput()
				->with('errors', $validator->getMessageBag()->toArray());
			}

			$user = $input;

			

			
			
			

		}


		// $user = \User::find( $id );

		// $user 	= $user->toArray();

		$groups = new \Group;
		$groupObj = $groups->lists();
		$groupArr = array();

		foreach($groupObj as $group)
		{
			$groupArr[$group->id] = $group->group;
		}

	

    	return \View::make('user::user.member-details')
    		->with('user', $user)
    		->with('groups', $groupArr);
    }

    public function userContactAction( $id )
    {

    	$user = \User::find( $id );


    	if( \Input::server('REQUEST_METHOD') == 'POST' )
    	{
    		$input = \Input::all();

    		$rules = array(
					'email'				=> 'required|email',//|unique:users,email,'.$id,
					'birthdate' 		=> 'date',
					'address_1' 		=> 'required',
					'state' 			=> 'required',
					'postcode'			=> 'required',
					'country'			=> 'required',
				);

			$email 				= $input['email'];
			$user->email 		= $email;
			$user->address_1 	= $input['address_1'];
			$user->address_2 	= $input['address_2'];
			$user->postcode 	= $input['postcode'];
			$user->state 		= $input['state'];
			$user->country 		= $input['country'];
			$user->mobile 		= $input['mobile'];


			$validator = Validator::make($input, $rules);
			
			if( $validator->passes() )
			{
				if( $user->save() )
				{
					$user['id'] = $user->id;
					return Redirect::to('admin/member/'.$user['id'].'/edit/contact')
						->withInput()
						->with('success_msg', \Lang::get('messages.saved'));
				}
				else
				{
	
					
					return Redirect::to('admin/member/'.$id.'/edit/contact')
						->withInput()
						->with('error_msg', 'Unable to save the data');
				}
			}

			else
			{
				return Redirect::to('admin/member/'.$id.'/edit/contact')
				->withInput()
				->with('errors', $validator->getMessageBag()->toArray());
			}
    	}

    	if( $user )
    	{
			$user 	= $user->toArray();
		}

    	$groups = new \Group;
		$groupObj = $groups->lists();
		$groupArr = array();

		foreach($groupObj as $group)
		{
			$groupArr[$group->id] = $group->group;
		}




    	return \View::make('user::user.contact-details')
    		->with('user', $user)
    		->with('groups', $groupArr);

    }

   


}