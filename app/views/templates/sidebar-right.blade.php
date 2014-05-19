@extends('layouts.front')
@section('content')


<div class="main-content">
  <div class="main-content-body">
    <div class="main-content-heading">
      <h1>{{ $page['post_title'] }}</h1>
    </div>
    @if( $page['post-media'] )
    <div class="img-inner-bordered img-shadow-lg">
       {{ $page['post-media'] }}
    </div>
    @endif
    {{ $page['post_content'] }}
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