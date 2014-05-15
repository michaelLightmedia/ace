@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top mb-3em">
	<div class="container">
		<div class="thankyou-page">
			<h1 class="title">Thank You!</h1>
			<h3 class="title-ribbon">for your signing up Sitetbo</h3>
			<p>Please check your email to activate your account</p>
			<a href="{{ URL::to('/login') }}" class="btn btn-orange">Login</a>
		</div>
	</div>
</div>
<div class="container">
  <div class="row">
    @if(Site::getBanner('Configurable Box'))
      @foreach( Site::getBanner('Configurable Box') as $banner )
      <div class="col-xs-6 col-md-4 col-sm-4 col-box-tiny">
        <div class="lbox">
          <div class="l-box-content">
            <h2 class="lbox-title">{{ $banner['title'] }}</h2>
            @if(isset($banner['banner_target']) && $banner['banner_target'] == 1)
              <a target="_blank" href="{{ Site::addhttp($banner['banner_url']) }}" class="btn btn-primary">@if( isset($banner['button_text']) ){{ $banner['button_text'] }}@else{{ 'Read more' }}@endif</a>
            @else 
              <a target="_self" href="{{ Site::addhttp($banner['banner_url']) }}" class="btn btn-primary">@if( isset($banner['button_text']) ){{ $banner['button_text'] }}@else{{ 'Read more' }}@endif</a>
            @endif
          </div>
          <img src="{{ $banner['image'] }}" alt="..." class="lbox-img">
        </div>
      </div>
      @endforeach
    @endif
  </div>
</div>
@stop