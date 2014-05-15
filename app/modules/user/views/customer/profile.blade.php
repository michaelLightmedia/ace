@extends('layouts.front')

@section('content')
<div class="section section--gray section--offset-top">
  <div class="container">
    <h1 class="h3 section__title">
      Welcome, <span class="text-blue">{{ Auth::user()->firstname }}!</span>
    </h1>
  </div>
</div>
<div class="section">
  <div class="container">
    {{ Site::system_messages() }}
    <ul class="nav nav-tabs nav-tabs--pretty">
      <li id="membership" class="active">
        <a href="{{ URL::to('customer/profile/membership') }}">
          Your Membership
          <span class="fa-triangle"></span>
        </a>
      </li>
      <li id="contact-details">
        <a href="{{ URL::to('customer/profile/contact-details') }}">
          Contact Details
        <span class="fa-triangle"></span>
        </a>
      </li>
      <li id="orders">
        <a href="{{ URL::to('customer/profile/orders') }}">
          Your Orders
          <span class="fa-triangle"></span>
        </a>
      </li>
      <!-- <li id="purchases">
        <a href="{{ URL::to('customer/profile/purchases') }}">
          Your Purchases
          <span class="fa-triangle"></span>
        </a>
      </li> -->
      <li id="points">
        <a href="{{ URL::to('customer/profile/points') }}">
          Your Points
          <span class="fa-triangle"></span>
        </a>
      </li>
      <li id="friends">
        <a href="{{ URL::to('customer/profile/friends') }}">
          Your Friends
          <span class="fa-triangle"></span>
        </a>
      </li>
    </ul>
    @yield('sub-content')
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