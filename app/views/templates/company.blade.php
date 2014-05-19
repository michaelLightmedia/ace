@extends('layouts.front')
@section('content')


<div class="main-content">
  <div class="main-content-body">
    <div class="main-content-heading">
       <h1>{{ $page['post_title'] }}</h1>
    </div>
    <div class="img-inner-bordered img-shadow-lg">
      <img src="{{ URL::asset('assets/site/placeholders/post-lg.jpg') }}" alt="">
    </div>
    <div class="copy copy-sm">
      <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Nam liber tempor cum soluta nobis eleifend option congue
      </p>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Dtem insitam; est usus legentis in iis qui.</p>
      <blockquote>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore</blockquote>
    </div>
    <hr>
    <div class="row">
      <div class="col-xm-12 col-xs-6 col-sm-6">
        <div class="post post-default">
          <div class="post-img img-inner-bordered">
            <img src="{{ URL::asset('assets/site/placeholders/post-md.jpg') }}" alt="">
          </div>
          <div class="post-content">
            <h2 class="post-title">
              <a href="">
                <span>Lorem Ipsum</span>
              </a>
            </h2>
            <p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum,Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. <a href="#">read more</a></p>
          </div>
        </div>
      </div>
      <div class="col-xm-12 col-xs-6 col-sm-6">
        <div class="post post-default">
          <div class="post-img img-inner-bordered">
            <img src="{{ URL::asset('assets/site/placeholders/post-md.jpg') }}" alt="">
          </div>
          <div class="post-content">
            <h2 class="post-title">
              <a href="">
                <span>Lorem Ipsum</span>
              </a>
            </h2>
            <p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum,Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. <a href="#">read more</a></p>
          </div>
        </div>
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