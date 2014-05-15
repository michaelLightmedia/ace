@extends('layouts.front')

@section('content')

<div id="main-carousel" class="carousel carousel-main slide" data-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators-wrap">
    <a class="" href="#main-carousel" data-slide="prev">
      <span class="icon-prev"></span>
    </a>
    <ol class="carousel-indicators">
      <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#main-carousel" data-slide-to="1"></li>
      <li data-target="#main-carousel" data-slide-to="2"></li>                
    </ol>
    <a class="" href="#main-carousel" data-slide="next">
      <span class="icon-next"></span>
    </a>
  </div>


  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    @foreach( Site::getBanner('Home') as $banner )
        <div class="item @if(key($banner) == 0) active @endif">
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
  @endforeach
  </div>
</div>
<div class="main-links">
  <div class="title">
    <p>Welcome</p>
    <h3 class="">Ace Contractors Group Pty. Ltd.</h3>
  </div>
  <ul>
    <li> <a href=""> <span>Our</span> Profile<i class="icon-chevron"></i></a></li>
    <li> <a href=""> <span>Our</span> Projects<i class="icon-chevron"></i></a></li>
    <li> <a href="people.php"> <span>Our</span> People<i class="icon-chevron"></i></a></li>
  </ul>
</div>
<div class="navbar-skin-feat">
<ul class="nav navbar-nav navbar-featured center-block">
    <li>
      <a href="#"><span class="nav-icon"><i class="icon icon-civilservices"></i></span> <span class="navbar-text">Civil Services</span></a>
    </li>
    <li>
      <a href="solutions.php"><span class="nav-icon"><i class="icon icon-electInfrast"></i></span> <span class="navbar-text">Electrical Infrastructure</span></a>
    </li>
    <li>
      <a href="resources.php"><span class="nav-icon"><i class="icon icon-environmental"></i></span> <span class="navbar-text">Ace Environmental</span></a>
    </li>
    <li><a href="company.php"><span class="nav-icon"><i class="icon icon-aceinfrast"></i></span> <span class="navbar-text">Ace Infrastructure</span></a>
    </li>
    <li>
      <a href="contact.php"><span class="nav-icon"><i class="icon icon-landscapeservices"></i></span> <span class="navbar-text">Lands+cape Sevices</span></a>
    </li>
    <li>
      <a href="contact.php"><span class="nav-icon"><i class="icon icon-aceWaterServices"></i></span> <span class="navbar-text">Ace Water Services</span></a>
    </li>
</ul>
</div>


<div class="main-content main-content-home">
<div class="row">
  <div class="col-sm-4">
    <div class="post post-block">
      <a href="people.php">
        <img src="{{ URL::asset('assets/site/placeholders/post-1.jpg') }}" alt="">
        <div class="post-content">
          <h2 class="post-title">Our people!</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="post post-block">
      <div id="widget-carousel" class="carousel carousel-main slide" data-ride="carousel">
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
        <div class="carousel-inner">
          <div class="item active">
            <a href="projects.php">
              <img src="{{ URL::asset('assets/site/placeholders/post-2.jpg') }}" alt="...">
            </a>
          </div>
          <div class="item">
            <a href="projects.php">
              <img src="{{ URL::asset('assets/site/placeholders/post-2.jpg') }}" alt="...">
            </a>
          </div>
          <div class="item">
            <a href="projects.php">
              <img src="{{ URL::asset('assets/site/placeholders/post-2.jpg') }}" alt="...">
            </a>
          </div>
        </div>
      </div>
      <div class="post-content">
        <h2 class="post-title">Our Projects!</h2>
        <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="post post-block">
      <a href="">
        <img src="{{ URL::asset('assets/site/placeholders/post-3.jpg') }}" alt="">
        <div class="post-content">
          <h2 class="post-title">Our Services!</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipis.</p>
        </div>
      </a>
    </div>
  </div>
</div>
</div>


@stop