@extends('layouts.front')
@section('content')
<?php
$people   = \PPost::where('post_type', 'people')->get(); 

$person_id = Input::get('id') ? Input::get('id') : ( $people ? $people[0]->id : 0);

?>
<div class="main-content">
    <div class="main-content-body">
      <div class="main-content-heading">
         <h1>{{ $page['post_title'] }}</h1>
      </div>
      <div class="row">
        <div class="group group-l5">
          @if( $person_id )
          <div class="profile profile-lg clearfix">
            
            <?php
              $result = \PPost::find($person_id);
              $thumbnail = \PPost::mediaAttachment($result->id, 'large');
            ?>
            <div class="img-inner-bordered profile-img">
              <img src="{{ $thumbnail }}" alt="">
            </div>
            <div class="profile-body">
              <h2 class="h4 profile-title">{{ $result->post_title }}</h2>
              <span class="profile-description">{{ $result->post_excerpt }}</span>

              <div class="copy copy-sm">
                {{ $result->post_content }}
              </div>
            </div>
            
          </div>
          @endif
           @if( $people )
        <?php 
          
          foreach( $people as $person ) { 
            $thumbnail = \PPost::mediaAttachment($person->id, 'post-thumbnail');
         ?>
        <div class="block">
          <a href="/people?id={{ $person->id }}" data-person="{{ $person->id }}" class="the-person">
            <img src="{{ $thumbnail }}" alt="">
            <h3 class="block-title h6">{{ $person->post_title }}</h3>
          </a>
        </div>
        <?php } ?>
        @endif

        </div>
      </div>
    </div>
    <div class="main-content-sidebar">
        {{ Site::getWidget(array(
            'widget'  => 'Sidebar',
            'widgetWrap' => 'div',
            'widgetWrapClass' => 'widget widget-l2',
            'showTitle' => true,
            'titleWrap' => 'h3',
            'titleWrapClass' => 'widget-title'
          )) }}
    </div>
  </div>
@stop