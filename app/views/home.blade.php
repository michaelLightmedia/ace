@extends('layouts.front')

@section('content')
<?php 
      $flag = true; 
      $banners = Site::getBanner('Home');

    ?>
<div id="main-carousel" class="carousel carousel-main slide" data-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators-wrap">
    <a class="" href="#main-carousel" data-slide="prev">
      <span class="icon-prev"></span>
    </a>
    <ol class="carousel-indicators">
      @for( $i = 1; $i <= count( $banners ); $i++ )
      <li data-target="#main-carousel" data-slide-to="{{ $i }}" class="@if( $i == 1 ) active @endif"></li>
      @endfor               
    </ol>
    <a class="" href="#main-carousel" data-slide="next">
      <span class="icon-next"></span>
    </a>
  </div>


  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    @foreach( $banners as $banner )
        <div class="item @if( $flag ) active @endif">
           <img src="{{ $banner['image'] }}" alt="...">
          <div class="carousel-caption">
            <h1 class="carousel-title">{{ $banner['title'] }}</h1>
            <p>{{ strip_tags($banner['content']) }}</p>
             @if(isset($banner['banner_target']) && $banner['banner_target'] == 1)
                <a target="_blank" href="{{ Site::addhttp($banner['banner_url']) }}" class="btn btn-lg btn-yellow-strip">{{ $banner['button_text'] }}</a>
              @else 
                <a target="_self" href="{{ Site::addhttp($banner['banner_url']) }}" class="btn btn-lg btn-yellow-strip">{{ $banner['button_text'] }}</a>
              @endif

          </div>
        </div>
        <?php $flag = false;  ?>
  @endforeach
  </div>
</div>

<div class="navbar-skin-feat">
<ul class="nav navbar-nav navbar-featured center-block">
    <li>
      <a href="/civil-services"><span class="nav-icon"><i class="icon icon-civilservices"></i></span> <span class="navbar-text">Civil Services</span></a>
    </li>
    <li>
      <a href="/electrical-infrastructure"><span class="nav-icon"><i class="icon icon-electInfrast"></i></span> <span class="navbar-text">Electrical Infrastructure</span></a>
    </li>
    <li>
      <a href="/ace-environment"><span class="nav-icon"><i class="icon icon-environmental"></i></span> <span class="navbar-text">Ace Environmental</span></a>
    </li>
    <li><a href="/ace-infrastructure"><span class="nav-icon"><i class="icon icon-aceinfrast"></i></span> <span class="navbar-text">Ace Infrastructure</span></a>
    </li>
    <li>
      <a href="/landscape-services"><span class="nav-icon"><i class="icon icon-landscapeservices"></i></span> <span class="navbar-text">Lands+cape Sevices</span></a>
    </li>
    <li>
      <a href="/ace-water-services"><span class="nav-icon"><i class="icon icon-aceWaterServices"></i></span> <span class="navbar-text">Ace Water Services</span></a>
    </li>
</ul>
</div>


<div class="main-content main-content-home">
<div class="row">
  {{ Site::getWidget(array(
      'widget'  => 'Footer Widget',
    )) }}
</div>
</div>


@stop