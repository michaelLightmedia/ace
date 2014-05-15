@extends('layouts.front')

@section('content')
<div class="section section--gray section--offset-top">
  <div class="container">
    <h1 class="h3 section__title">
      Welcome, <span class="text-blue">{{ Auth::user()->firstname }}!</span>
    </h1>
  </div>
</div>
<div class="section section--offset-top">
  <div class="container">
    {{ Site::system_messages() }}
    Dashboard
  </div>
</div>
<script>
  $('.nav-tabs li').removeClass('active');
  @if(Request::segment(3) != '' )
    $('#{{ Request::segment(3) }}').addClass('active');
  @else
    $('.nav-tabs li:eq(0)').addClass('active');
  @endif
</script>
@stop