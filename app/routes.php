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

	return View::make('home');
});



Route::get('/phpinfo', function(){
 	phpinfo();
});

Route::get('/test', function(){
	$x = DB::connection('odbc')->select();
	print_r($x);
	die;
});


Route::any('q', function(){

	$data = Input::all();

	$posts = DB::table('posts')
				->leftJoin('term_relationships', 'posts.id', '=', 'term_relationships.object_id')
				->leftJoin('term_taxonomy', 'term_relationships.term_taxonomy_id', '=', 'term_taxonomy.term_taxonomy_id')
				->leftJoin('terms', 'term_taxonomy.term_id', '=', 'terms.term_id')
				->whereNotIn('post_type', array('nav_menu_item', 'banner', 'attachment', 'widget_item', 'page' ) )
				->where(function( $query ) use ( $data ) {

					$s = $data['s'];

					$query->where('post_title', 'like', "%$s%")
						->orWhere( 'post_content', 'like', "%$s%" )
						->orWhere( 'post_excerpt', 'like', "%$s%" );
						
				})
				->groupBy('posts.id')
				->remember(10)
				->get();


	return View::make('search')
				->with('posts', $posts);
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
	});//->before('manage_settings_permission');

	
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

	return Redirect::to('/contact')
				->with('errors', $validator->getMessageBag()->toArray())
				->withInput(Input::all());

	

});



Route::any('{guid}',function($guid){
	$post 	= \PPost::where('guid', $guid)->remember(10)->firstOrFail();
    if ($post) {
        $metas = $post->postmeta->toArray();

        $arrPost = $post->toArray();

        foreach($metas as $row)
        {
            $arrPost[$row['meta_key']] = $row['meta_value'];
        }

        //$arrPost['post_content']  = str_replace('[contact_form param1="hello" param2="3"]', 'Hello World', $arrPost['post_content']);
        $arrPost['post-media'] = Site::postFeatureMedia($post::mediaAttachment($arrPost['id'], 'large'));
		$template = isset($arrPost['page_template']) && View::exists('templates.'.$arrPost['page_template']) ? $arrPost['page_template'] : 'default' ;

		return View::make('templates.'.$template)
			->with('page', $arrPost);
    }
});


Route::any( '{taxonomy}/{category}', function( $taxonomy, $category ) {

	$post = new StdClass;

	$items = DB::table('posts')
				->join('term_relationships', 'posts.id', '=', 'term_relationships.object_id')
				->join('term_taxonomy', 'term_relationships.term_taxonomy_id', '=', 'term_taxonomy.term_taxonomy_id')
				->join('terms', 'term_taxonomy.term_id', '=', 'terms.term_id')
				->where('term_taxonomy.taxonomy', '=', $taxonomy)
				->where('terms.slug', $category)
				->groupBy('posts.id')
				->remember(10)
				->get();

	$post->lists = $items;
	$post->taxonomy = $taxonomy;
	$post->category = Terms::Where('slug', $category)->pluck('name');

	return View::make('category')
			->with('post', $post);


});

Route::any( 'archive/{category}/{year}', function( $category, $year ) {
	
	$post = new StdClass;

	$items = DB::table('posts')
				->join('term_relationships', 'posts.id', '=', 'term_relationships.object_id')
				->join('term_taxonomy', 'term_relationships.term_taxonomy_id', '=', 'term_taxonomy.term_taxonomy_id')
				->join('terms', 'term_taxonomy.term_id', '=', 'terms.term_id')
				//->whereNotIn('post_type', array('nav_menu_item', 'banner', 'attachment', 'widget_item', 'page' ) )
				->where('terms.slug', '=', $category)
				->where(DB::raw('YEAR(post_date)'),'=', $year)
				->groupBy('posts.id')
				->remember(10)
				->get();

	$post->lists = $items;

	return View::make('archive')
			->with('post', $post);

})->where('year', '[0-9]+');



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

