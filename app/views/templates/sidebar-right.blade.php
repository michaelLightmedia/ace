@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top">
  <div class="container">
    <div class="pull-left">
      <h1 class="h3 section__title pt-15px">
        
      </h1>
      <p></p>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
        {{ $page['post-media'] }}
        {{ $page['post_content'] }}
    </div>
  </div>
</div>

@stop


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
    {{ $page['post_content'] }}
  </div>
  <div class="main-content-sidebar">
    <div class="widget widget-l2">
      <h3 class="widget-title">Client Testimonials</h3>
      <div class="widget-body">
        <div class="post-testimonial">
          <div class="row">
            <div class="col-xs-4">
              <div class="avatar">
                <img src="{{ URL::asset('assets/site/placeholders/avatar.jpg') }}" alt="">                  
              </div>
            </div>
            <div class="col-xs-8 widget-bl copy">
              <p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei, </p>
              <span>Chuck M.</span>
            </div>
          </div>
        </div>
        <div class="post-testimonial">
          <div class="row">
            <div class="col-xs-4">
              <div class="avatar">
                <img src="{{ URL::asset('assets/site/placeholders/avatar2.jpg') }}" alt="">                  
              </div>
            </div>
            <div class="col-xs-8 widget-bl copy">
              <p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei, </p>
              <span>Chuck M.</span>
            </div>
          </div>
        </div>
        <div class="post-testimonial">
          <div class="row">
            <div class="col-xs-4">
              <div class="avatar">
                <img src="{{ URL::asset('assets/site/placeholders/avatar3.jpg') }}" alt="">                  
              </div>
            </div>
            <div class="col-xs-8 widget-bl copy">
              <p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei, </p>
              <span>Chuck M.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop