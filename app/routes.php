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


	$attachment_id = Input::get('attachment_id');

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
	}


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


Route::get('/thankyou', function()
{
	return View::make('front.thank-you');
});


Route::get('/projects', function()
{
	return View::make('front.projects');
});


Route::get('/company', function()
{
	return View::make('front.company');
});


Route::get('/contact', function()
{
	return View::make('front.contact');
});

Route::get('/tenders', function()
{
	return View::make('front.tenders');
});

Route::get('/people', function()
{
	return View::make('front.people');
});

Route::get('/policies', function()
{
	return View::make('front.policies');
});


Route::post('countdown', function(){

	$input 		= Input::all();
	$pcode = $input['code'];

	$product = Site::calculateDealStock( $pcode );

	echo json_encode(array('code' => $product->productCode, 'quantity' => $product->quantity));
	exit;
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




//Display blog listings
Route::any('blogs', function()
{

	//Get search
	$s 			= Input::get('s');
	//Get page
	$page 		= Input::get('page');
	//Check if page is set
	$page 		= isset($page) ? $page : 1;

	$p 			= new PPost;
	$post 		= $p::where('post_type', 'blog')->where('post_status', 'publish');
	//Per page
	$per_page 	= Settings::get('post_per_page') ? Settings::get('post_per_page') : 9;
	$offset  = ($page - 1) * $per_page;
	//Get total items
	$totalRows = $post->count();

	$post = $post->where(function($query) use($s){
		$query->where('post_title', 'like', "%$s%")
			->orWhere('post_content', 'like', "%$s%");
	})->skip($offset)->take($per_page)->orderby('post_date','desc')->get();

	$ppost = $post;
	$data = array();
    $post_type = "blog";
	foreach($ppost as $item)
	{
		$blogs 	= $item->toArray();
        $blogs['post_id'] = $item->id;
		$metas 	= $item->postmeta->toArray();
		$blogs['totalComments'] = $item->comment->count();
		foreach($metas as $meta)
		{
			$blogs[$meta['meta_key']] = $meta['meta_value'];
		}
		if($author = User::authorById($item['author_id']))
		{
			$blogs = array_merge($blogs, $author->toArray());
		}
		
		$title = $item->post_title;
		//Excerpt title
		$blogs['post_excerpt_title'] = strlen($title) > 25 ?  substr($title, 0, 22).'...' : $title;
		//Get post content
		$content = strip_tags($item->post_content);
		//Get excerpt content
		$blogs['excerpt'] 	= isset($item->excerpt) ? strip_tags($item->excerpt) : strlen($content > 50) ? substr($content, 0, 47).'[…]' : $content ;
		//Get featured media
		//$blogs['post-media'] = Site::postFeatureMediaThumb($p::mediaAttachment($item->id, 'large'), 'thumbnail_large');
		$blogs['post-media'] = Site::postFeatureMedia($item::mediaAttachment($item->id, 'post-thumbnail'));

		$data[] = $blogs;
	}

    return View::make('front.blogs')
		->with('blogs', $data)
		->with('totalItems', $totalRows)
		->with('post_type', 'blog');
});

//Display single product
Route::any('blog/{slug}', function( $slug )
{

	$blog 	= \PPost::where('guid', $slug)->firstOrFail();
	$post 		= $blog;
		
	$metas = $blog->postmeta->toArray();
	
	
	$arrPost = $post->toArray();

	$arrPost['post_id'] = $blog->id;
	$arrPost['totalComments'] = $blog->comment->count();
	foreach($metas as $row)
	{
		$arrPost[$row['meta_key']] = $row['meta_value'];
	}
	if($author = User::authorById($arrPost['author_id']))
	{
		$arrPost = array_merge($arrPost, $author->toArray());
	}
	
	$arrPost['post-media'] = Site::postFeatureMedia($post::mediaAttachment($blog->id, 'post-thumbnail'));


	//Check if user is logged in
	if(Auth::check())
	{
		//Log post to recent viewed
		PostRecentlyViewed::logPostViewed($post->id, $arrPost['post_type']);
	}


	return View::make('front.single-blog')
		->with('blog', $arrPost);
});


// Display groupbuy listings
Route::any('{post_type}', function($post_type)
{

	$hasExpiration  = true;
	switch( $post_type )
	{
		case 'groupbuy':
			$post_type = 'groupbuy';
			$hasExpiration =  true;
			$heading = 'Group buy';
			break;
		case 'promotions':
			$post_type = 'promotion';
			$hasExpiration =  false;
			$heading = 'Promotions';
			break;
		case 'services-treatments':
			$post_type = 'service-treatment';
			$hasExpiration = false;
			$heading = 'Service & Treatment';
			break;
		case 'events':
			$post_type = 'event';
			$hasExpiration = false;
			$heading = 'Event';
			break;
	}

	$result = Product::getProductByPostType($post_type);


	return View::make('front.products')
		->with('products', $result['data'])
		->with('totalItems', $result['totalItem'])
		->with('heading', $heading)
		->with('hasExpiration', $hasExpiration);
})->where(array('post_type' => 'groupbuy|promotions|services-treatments|events'));






Route::get( '/contact-us', 'SiteController@getContactUs');
Route::post( '/contact-us', 'SiteController@postContactUs');

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

        return View::make('front.single')
            ->with('page', $arrPost);
    }
});


/**-----------------------------------------
* LISTS OF COMMENT ROUTES
*------------------------------------------*/	
Route::get('post/comment/{id}', function( $id ){

	$post_id = $id;

	$comment = new CommentHelper;

	ob_start();
	
	$comment->getPostCommentHTML($post_id);
	$comments = ob_get_contents();
	
	ob_end_clean();

	echo $comments;
});


/**-----------------------------------------
* Development Helper
--------------------------------------------*/
Route::controller('developer/database','DatabaseController');


/**-----------------------------------------
* Last Resource
--------------------------------------------*/




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
/*
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
*/
