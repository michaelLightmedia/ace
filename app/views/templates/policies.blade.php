@extends('layouts.front')
@section('content')


<div class="main-content">
  <div class="main-content-body">
    <div class="main-content-heading">
      <h1>{{ $page['post_title'] }}</h1>
    </div>

  <?php  $policies   = \PPost::where('post_type', 'policy')->where('post_status', 'publish')->get();
  

  foreach( $policies as $policy ) {

    $post_thumbnail = \PPost::mediaAttachment($policy->id, 'post-thumbnail'); ?>
      <article class="post post-spread">
        <div class="row">
          <div class="col-md-2">
            <img src="{{ $post_thumbnail }}" alt="" class="post-img">
          </div>
          <div class="col-md-10">
            <h2 class="post-title">{{ $policy->post_title }}</h2>
            <div class="post-body">
              <p>{{ excerpt_content( $policy->post_content, 700 ) }}</p>
            </div>
            <div class="pull-left">
              <span class='st_pinterest_hcount' displayText='Pinterest'></span>
              <span class='st_fblike_hcount' displayText='Facebook Like'></span>
              <span class='st_twitter_hcount' displayText='Tweet'></span>
              <span class='st_plusone_hcount' displayText='Google +1'></span>
            </div>
            <div class="pull-right">
              <a href="{{ $policy->guid }}" class="btn btn-sm btn-yellow-strip">Read More</a>
            </div>
          </div>
        </div>
      </article>
  <?php } ?>
  </div>
  <div class="main-content-sidebar">
    {{ Site::getWidget(array(
            'widget'  => 'Policies Sidebar',
            'widgetWrap' => 'div',
            'widgetWrapClass' => 'widget widget-l2 widget-sm',
            'showTitle' => true,
            'titleWrap' => 'h3',
            'titleWrapClass' => 'widget-title'
          )) }}
  </div>
</div>
@stop