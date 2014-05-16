<?php


add_shortcode( 'our-project', 'our_projects' );


function our_projects( $attr = false ) {

	$innerHTML = '';

	$projects 	= \PPost::where('post_type', 'project')->get();
	

	foreach( $projects as $project ) {

		$project_thumbnail = \PPost::mediaAttachment($project->id, 'project_thumbnail');


		$innerHTML .= '<div class="col-xm-12 col-xs-6 col-sm-4">
	      <div class="post post-box">
	      <div class="post-inner">
	        <div class="post-content">
	          <h2 class="post-title">
	            <a href="">
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