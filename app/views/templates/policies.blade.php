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
              <!-- AddThis Button BEGIN -->
              <div class="addthis_toolbox addthis_default_style "

               addthis:url="{{ URL::to($policy->guid) }}"
              addthis:title="{{ $policy->post_title }}"
              addthis:description="{{ excerpt_content( $policy->post_content, 700 ) }}"
              >
              <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
              <a class="addthis_button_tweet"></a>
              <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
              <a class="addthis_counter addthis_pill_style"></a>
              </div>
             
              <!-- AddThis Button END -->
            </div>
            <div class="pull-right">
              <a href="{{ URL::to($policy->guid) }}" class="btn btn-sm btn-yellow-strip">Read More</a>
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