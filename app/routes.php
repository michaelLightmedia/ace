<?php
//use Illuminate\Database\Eloquent\ModelNotFoundException;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/





Route::get('/', function()
{


	/*$attachment_id = Input::get('attachment_id');

	if( isset($attachment_id) )
	{
		$post 	= \PPost::where('id', Input::get('attachment_id'))->firstOrFail();
		
		$metas = $post->postmeta->toArray();

		$arrPost = $post->toArray();

		foreach($metas as $row)
		{
			$arrPost[$row['meta_key']] = $row['meta_value'];
		}

		$arrPost['post-media'] = Site::postFeatureMedia( $arrPost['guid'] );


		return View::make('front.single')
			->with('page', $arrPost);
	}


	$s = Input::get('s');

	if( isset($s) )
	{

		//Get page
		$page 		= Input::get('page');
		//Check if page is set
		$page 		= isset($page) ? $page : 1;

		//Per page
		$per_page 	= Settings::get('post_per_page') ? Settings::get('post_per_page') : 9;
		$offset  = ($page - 1) * $per_page;
		//Get total items
		


		$posts = PPost::whereRaw("(post_title like '%$s%' OR post_content like '%$s%') AND post_type IN ('blog', 'groupbuy', 'promotion', 'event', 'service-treatment') ")
		->select(DB::raw('post_title, post_content, guid, post_type '));

		$totalRows = $posts->count();

		$results = $posts->skip($offset)->take($per_page)->orderby('post_date','desc')->get();



		return View::make('front.search')
			->with('totalItems', $totalRows)
			->with('key', preg_quote($s))
			->with('results', $results);
	}*/
	return View::make('front.home');
});


Route::post('offsetTimeZone', function(){
	$offset = Input::get('offset');

	if(!Session::has('timezoneOffset'))
	{
		Session::put('timezoneOffset', $offset);

		Site::setTimeZone($offset);
	}
});





Route::group(array('before' => 'auth'), function()
{

	//Administrator Dashboard
	Route::any('admin/dashboard',function() {

		return View::make('admin.dashboard');
	})->before('manage_settings_permission');

	
	Route::get('admin/download', function(){
		$file = Input::get('file');

		$filename = basename($file);
		
		return Response::download($file, '1st attempt.jpg', array());
	})->before('auth');


	Route::post('post/comment', function(){
		
		$input = \Input::all();
		$comment = new Comment;

		$comment->comment       = $input['comment'];
		$comment->created_at    = date('Y-m-d H:i:s');
		$comment->user_id       = \Auth::User()->id;
		$comment->post_id       = $input['post_id'];
		$affectedRows 			= $comment->save();

		if( Request::ajax() )
		{
			echo json_encode(array('status' => $affectedRows));
			exit;
		}
		else
		{
			return $affectedRows;
		}

	});
	

	
	

	Route::get('admin/post-list', function(){

		$post 		= DB::table('posts')
			->whereIn('post_type', array('groupbuy', 'service-treatment', 'event', 'event'))
			->select('id', 'post_title')->get(); 	

		echo json_encode($post);
		exit;
	});



});




Route::post( '/contact-us', function(){


	$post = \Input::all();
	$rules = array(
			'last_name' => 'required',
			'first_name' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'comment' => 'required',
		);

	$validator = \Validator::make($post, $rules);
	if( $validator->passes() )
	{
			$data = array(
					'name' => $post['first_name'].' '.$post['last_name'],
					'email' => $post['email'],
					'phone' => $post['phone'],
					'comment' => $post['comment']
				);
			//Send email notification to administrator
			Mail::send('emails.contact_us_notification',$data, function($message)  use($data){
				$message->to( Config::get('site.emails.contact_us_recipeint.email'), Config::get('site.emails.contact_us_recipeint.name'))->subject('New Contact Information');
			});

		return \Redirect::to('/contact-us-thank-you');

	} 

	return \Redirect::to('/contact')
					->withInput()
					->with('errors', $validator->getMessageBag()->toArray());

	

});



Route::any('{guid}',function($guid){
	$post 	= \PPost::where('guid', $guid)->firstOrFail();
    if ($post) {
        $metas = $post->postmeta->toArray();

        $arrPost = $post->toArray();

        foreach($metas as $row)
        {
            $arrPost[$row['meta_key']] = $row['meta_value'];
        }

        //$arrPost['post_content']  = str_replace('[contact_form param1="hello" param2="3"]', 'Hello World', $arrPost['post_content']);
        $arrPost['post-media'] = Site::postFeatureMedia($post::mediaAttachment($arrPost['id'], 'large'));
		$template = isset($arrPost['page_template']) ? $arrPost['page_template'] : 'default' ;

		return View::make('templates.'.$template)
			->with('page', $arrPost);
    }
});



/**-----------------------------------------
* LISTS OF EXCEPTION
--------------------------------------------*/



//Page not found exception
App::missing(function($exception)
{
	Log::error($exception);

    return Response::view('errors.404', array(), 404);
});

//Error exception
// App::error(function(ErrorException $e)
// {
// 	Log::error($e);
// 	if(Request::ajax())
// 	{
// 	    return Response::json(array(
// 	        'error' => 'Error:'.$e->getMessage()
// 	    ));
// 	}
// 	else
// 	{
// 		return Response::view('errors.500', array('message' => $exception->getMessage()), 500);
// 	}
// });

//Model not found exception
App::error(function(Illuminate\Database\Eloquent\ModelNotFoundException $e)
{
	Log::error($e);
    if(Request::ajax())
	{
	    return Response::json(array(
	        'error' => 'Model not found :'.$e->getMessage()
	    ));
	}
	else
	{
		return Response::view('errors.404', array(), 400);
	}
});




 

//Method not allowed exception
App::error(function(Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e)
{

	Log::error($e);
	if(Request::ajax())
	{
		return Response::json(array(
	        'error' => 'Method not allowed'
	    ));
	}
    else
	{
		return Response::view('errors.500', array('message' => $e->getMessage()), 500);
	}

});

//Token Mismatch exception
App::error(function(Illuminate\Session\TokenMismatchException $e)
{
	Log::error($e);
	if( Request::ajax() )
	{
		return Response::json(array(
	        'error' => 'Token mismatch'
	    ));
	}
	else
	{
		return Response::view('errors.500', array('message' => 'Token mismatch'), 500);
	}

});

App::error(function(LogicException $e)
{
	Log::error($e);
	if( Request::ajax() )
	{
		return Response::json(array(
	        'error' => $e->getMessage()
	    ));
	}
	else
	{
		return Response::view('errors.500', array('message' => $e->getMessage()), 500);
	}

});


App::error(function($exception, $code)
{
    switch ($code)
    {

        case 403:
        	Log::error($exception);
            return Response::view('errors.403', array(), 403);

       	// case 404:
       	// 	Log::error($exception);
        //     return Response::view('errors.404', array(), 404);

        // case 500:
        // 	Log::error($exception);
        //     return Response::view('errors.500', array('message' => $exception->getMessage()), 500);

        // default:
        // 	Log::error($exception);
        //     return Response::view('errors.default', array(), $code);
    }
});

