<?php


add_shortcode( 'our-project', 'our_projects' );


function our_projects( $attr = false ) {

	$innerHTML = '';

	$projects 	= \PPost::where('post_type', 'project')->where('post_status', 'publish')->get();
	

	foreach( $projects as $project ) {

		$project_thumbnail = \PPost::mediaAttachment($project->id, 'project_thumbnail');


		$innerHTML .= '<div class="col-xm-12 col-xs-6 col-sm-4">
	      <div class="post post-box">
	      <div class="post-inner">
	        <div class="post-content">
	          <h2 class="post-title">
	            <a href="'. URL::to( $project->guid ) .'">
	              <span>'. $project->post_title .'</span>
	              <i class="post-link"><b class="icon-next-w"></b></i>
	            </a>
	          </h2>
	          <p>'. excerpt_content( $project->post_content, 150, '.' ) .' <a href="'. URL::to($project->guid) .'">read more</a></p>
	        </div>
	        <div class="post-img img-inner-bordered">
	          <img src="'.$project_thumbnail.'" />
	        </div>
	      </div>
	      </div>
	    </div>';
	}

	return $innerHTML;
}


add_shortcode( 'carousel-projects', 'carousel_projects' );

function carousel_projects() {
	$innerHTML = '';

	$projects 	= \PPost::where('post_type', 'project')->where('post_status', 'publish')->get();
	

	$innerHTML .= '<div id="widget-carousel" class="carousel carousel-main slide" data-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators-wrap carousel-indicators-wrap--secondary">
          <a class="" href="#widget-carousel" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="" href="#widget-carousel" data-slide="next">
            <span class="icon-next"></span>
          </a>
        </div>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">';

        $flag = true;
        foreach( $projects as $project ) {
        	//URL::to( $project->guid )
			$project_thumbnail = \PPost::mediaAttachment($project->id, 'post-thumbnail');
	        $innerHTML .= '
	          <div class="item '.( $flag ? 'active' : null ).'">
	            <a href="'. URL::to( '/projects' ) .'">
	              <img src="'.$project_thumbnail.'" alt="...">
	            </a>
	          </div>';
	          $flag = false;
        }

    $innerHTML .= '
        </div>
      </div>';

      return $innerHTML;

}

add_shortcode( 'client-testimonials', 'client_testimonials' );

function client_testimonials() {


	$innerHTML = '';

	$testimonials 	= \PPost::where('post_type', 'testimonial')->where('post_status', 'publish')->orderBy('id', 'asc')->take(5)->get();
	if( $testimonials ) {

		$innerHTML .= '<div class="widget-body">';
		foreach( $testimonials as $testimonial ) {

			$project_thumbnail = \PPost::mediaAttachment($testimonial->id, 'thumbnail');
			$innerHTML .= '<div class="post-testimonial">
		            <div class="row">
		              <div class="col-xs-4">
		                <div class="avatar">
		                  <img src="'.$project_thumbnail.'" alt="">                  
		                </div>
		              </div>
		              <div class="col-xs-8 widget-bl copy">
		                <p>'.excerpt_content( $testimonial->post_content ).'</p>
		                <span>'.$testimonial->post_title.'</span>
		              </div>
		            </div>
		          </div>';
	     }
	     $innerHTML .= '</div>';
 	}

	return $innerHTML;
}

add_shortcode('lists-taxonomy', 'lists_taxonomy');
function lists_taxonomy( $attr = false ) {

	if( $attr !== false )
		extract( $attr );

	$terms = \DB::table('term_taxonomy')->join('terms', 'term_taxonomy.term_id', '=', 'terms.term_id')->where('taxonomy', $slug)->get();
	$innerHTML = '';

	$innerHTML .= '<ul class="list-pretty">';

	foreach( $terms as $term ) {
    	$innerHTML .= '<li><a href="'. URL::to( $term->taxonomy.'/'.$term->slug ) .'">'. $term->name .'</a></li>';
	}

    $innerHTML .= '</ul>';

    return $innerHTML;

}


add_shortcode('cat-archive', 'category_archive');
function category_archive( $attr = false ) {

	if( $attr !== false )
		extract( $attr );

	$terms = DB::table('posts')
				->select( DB::raw(' YEAR(post_date) as publish_year, slug,name  ') )
				->join('term_relationships', 'posts.id', '=', 'term_relationships.object_id')
				->join('term_taxonomy', 'term_relationships.term_taxonomy_id', '=', 'term_taxonomy.term_taxonomy_id')
				->join('terms', 'term_taxonomy.term_id', '=', 'terms.term_id')
				->where('term_taxonomy.taxonomy', '=', $taxonomy)
				->where('terms.slug', $category)
				->groupBy('publish_year')
				->get();


	$innerHTML = '';
	$innerHTML .= '<ul class="list-pretty">';

	foreach( $terms as $term ) {
    	$innerHTML .= '<li><a href="'. URL::to( 'archive/'.$term->slug.'/'.$term->publish_year ) .'">'. $term->name.' '.$term->publish_year .'</a></li>';
	}

    $innerHTML .= '</ul>';

    return $innerHTML;

}


add_shortcode('search-form', 'search_form');

function search_form( $attr = false  ) {
	$innerHTML = '';
	$innerHTML .= '<form method="GET" action="'.URL::to('/q').'">
                    <input type="text" name="s" value="'. Input::get('s') .'" class="form-control">
                  </form>';
    return $innerHTML;
}