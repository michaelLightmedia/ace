<?php


add_shortcode( 'our-project', 'our_projects' );


function our_projects( $attr = false ) {

	$innerHTML = '';

	$projects 	= \PPost::where('post_type', 'project')->where('post_status', 'publish')->get();
	

	foreach( $projects as $project ) {

		$project_thumbnail = \PPost::mediaAttachment($project->id, 'post-thumbnail');


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

			$project_thumbnail = \PPost::mediaAttachment($project->id, 'post-thumbnail');
	        $innerHTML .= '
	          <div class="item '.( $flag ? 'active' : null ).'">
	            <a href="'. URL::to( $project->guid ) .'">
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