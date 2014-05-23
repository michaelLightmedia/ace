<?php




Route::group(array("before" => "guest"), function()
{

    //Get login modal form
    Route::get('ajax/login', function(){
        
        $view = View::make('user::auth.modal_login');

        if(!Auth::check())
        {
         //Check if user is logged in and has permission to share post
         return $view->render();
        }
        else
        {
         return 'auth';
        }
    });

    Route::any(
	'login',array(
	'as' 	=> 'login', 
	'uses' 	=> 'App\Modules\User\UserController@loginAction'));

    Route::any(
	'user/request',array(
	'as' 	=> 'user/request',
	'uses'	=> 'App\Modules\User\UserController@requestAction'));

    Route::any("user/reset", array(
        "as"   => "user/reset",
        "uses" => "App\Modules\User\UserController@resetAction"
    ));

    Route::get(
	'signup','App\Modules\User\UserController@getSignup');

    Route::post(
	'signup',array(
	'as' 	=> 'signup',
	'uses' 	=> 'App\Modules\User\UserController@postSignup'));

    Route::any(
    'user/activate',array(
    'as'    => 'user/activate',
    'uses'  => 'App\Modules\User\UserController@activeAction'));

});


Route::group(array("before" => "auth"), function()
{

    /*---------------------------------------------
        LIST OF ADMINISTRATOR ROUTES
     -----------------------------------------------*/
    //Logout
    Route::any("logout", 'App\Modules\User\UserController@logoutAction');
    //Lists of members
    Route::any('admin/members','App\Modules\User\UserController@indexAction');//->before('users_manage_permission');

    //Lists of members
    Route::post('admin/members/import','App\Modules\User\UserController@importAction');//->before('users_manage_permission');
    //Create member
	Route::any('admin/member/create', 'App\Modules\User\UserController@createAction')
        ->before('users_create_permission');
    //Edit member
    // Route::any('admin/member/{id}/edit', 'App\Modules\User\UserController@editAction')
    //     ->where('id', '[0-9]+')->before('users_edit_permission');
    //Delete member
    Route::post('admin/member/delete', 'App\Modules\User\UserController@deleteAction');//->before('users_delete_permission');
    //Change status of the member
    Route::post('admin/member/activate','App\Modules\User\UserController@activateAction');//->before('users_manage_permission');
    //Administrator profile
    Route::any('admin/profile', 'App\Modules\User\UserController@profileAction');//->before('users_manage_permission');

        

    Route::any('admin/member/{id}/edit/membership', 'App\Modules\User\UserController@userMembershipAction')
        ->where('id', '[0-9]+');//->before('users_edit_permission');

    // Route::any('admin/member/{id}/edit/contact', 'App\Modules\User\UserController@userContactAction')
    //     ->where('id', '[0-9]+')->before('users_edit_permission');

    // Route::any('admin/member/{id}/edit/purchases', 'App\Modules\User\UserController@userOrdersAction')
    //     ->where('id', '[0-9]+')->before('users_edit_permission');

    // Route::any('admin/member/{id}/edit/orders', 'App\Modules\User\UserController@userOrdersAction')
    //     ->where('id', '[0-9]+')->before('users_edit_permission');

    // Route::any('admin/member/{id}/edit/points', 'App\Modules\User\UserController@userPointsAction')
    //     ->where('id', '[0-9]+')->before('users_edit_permission');

    // Route::any('admin/member/{id}/edit/friends', 'App\Modules\User\UserController@userFriendsAction')
    //     ->where('id', '[0-9]+')->before('users_edit_permission');

    // Route::any('admin/member/delete/friends', 'App\Modules\User\UserController@deleteFriendsAction')
    // ->before('users_edit_permission');
    
        
    /*---------------------------------------------
        LIST OF MEMBER ROUTES
     -----------------------------------------------*/
     //Customer Dashboard
    // Route::get('customer/dashboard', function(){
    //     return View::make('user::customer.dashboard');

    // })->before('customer');
    // //Call membership page
    // Route::any('customer/profile/{membership?}', 'App\Modules\User\UserController@customerMembershipAction')
    // ->where(array('membership' => 'membership'))
    // ->before('customer');
    // //Call contact details page
    // Route::any('customer/profile/contact-details', 'App\Modules\User\UserController@customerDetailsAction')
    // ->before('customer');
    // //Call purchases page
    // Route::any('customer/profile/purchases', 'App\Modules\User\UserController@customerPurchasesAction')
    // ->before('customer');
    // //Call orders page
    // Route::any('customer/profile/orders', 'App\Modules\User\UserController@customerOrdersAction')
    // ->before('customer');
    // //Call points page
    // Route::any('customer/profile/points', 'App\Modules\User\UserController@customerPointsAction')
    // ->before('customer');
    // //Call friends page
    // Route::any('customer/profile/friends', 'App\Modules\User\UserController@customerFriendsAction')
    // ->before('customer');


    /*---------------------------------------------
        LIST OF GROUPS ROUTES
     -----------------------------------------------*/
    //Call groups page
    Route::any('admin/members/groups', 'App\Modules\User\GroupController@indexAction')
    ->before('administrator');
    //Call new group page
    Route::any('admin/members/group/create', 'App\Modules\User\GroupController@createAction')
    ->before('administrator');
    //Call edit group action
    Route::any('admin/members/group/{id}/edit', 'App\Modules\User\GroupController@editAction')
   // ->where(['id' => '[0-9]+'])
    ->before('administrator');
    //Call delete group action
    Route::any('admin/members/group/delete', 'App\Modules\User\GroupController@deleteAction')
    ->before('administrator');


    /*---------------------------------------------
        LIST OF LEVELS ROUTES
     -----------------------------------------------*/
    //Call groups page
    Route::any('admin/members/levels', 'App\Modules\User\LevelController@indexAction')
    ->before('administrator');
    //Call new level page
    Route::any('admin/members/level/create', 'App\Modules\User\LevelController@createAction')
    ->before('administrator');
    //Call edit level action
    Route::any('admin/members/level/{id}/edit', 'App\Modules\User\LevelController@editAction')
   // ->where(['id' => '[0-9]+'])
    ->before('administrator');
    //Call delete level action
    Route::any('admin/members/level/delete', 'App\Modules\User\LevelController@deleteAction')
    ->before('administrator');
    
    /*---------------------------------------------
        LIST OF CAPABILITY ROUTES
     -----------------------------------------------*/
    //Call delete group action
    Route::any('admin/members/capability/create', 'App\Modules\User\CapabilityController@createAction')
    ->before('administrator');
});


