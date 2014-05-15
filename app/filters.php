<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if(Request::ajax())
		{
			return json_encode(array('status' => 'not_logged_in', 'message' => 'Your are not login'));
		}
		else
		{
			 return Redirect::guest('login');
		}
	}

});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (is_logged_in())
    {
        if (is_admin() || is_super_user()) {
            if (can('manage_settings')) {
                return Redirect::to('/admin/dashboard');
            }
        }else {
            return Redirect::to("/dashboard");
        }
    }
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


Route::filter('customer', function(){
	if (Auth::guest()) return Redirect::guest('login');


	$userGroup = Auth::user()->group->group;
	if( $userGroup != 'Customer') return Redirect::to('admin/dashboard');
});

Route::filter('administrator', function(){
	if (Auth::guest()) return Redirect::guest('login');

	$userGroup = Auth::user()->group->group;
	if( $userGroup != 'Administrator' && $userGroup == 'Customer' ) return Redirect::to('member/dashboard');
});


//check if user has capability to create questions
Route::filter('buy_product_permission', function(){
	if(Auth::check())
	{
		if(!Auth::User()->group->hasRole('buy_product'))
		{
			if(Request::ajax())
			{
				echo json_encode(array('status' => false, 'message' => 'Permission Denied'));
				exit;
			}
			else
			{
				App::abort(403);
			}
		}
	}
});
