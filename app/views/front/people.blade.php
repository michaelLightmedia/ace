@extends('layouts.front')
@section('content')
<div class="main-content">
    <div class="main-content-body">
      <div class="main-content-heading">
        <h1>Our People</h1>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="profile profile-lg clearfix">
            <div class="img-inner-bordered profile-img">
              <img src="{{ URL::asset('assets/site/placeholders/people-1.jpg') }}" alt="">
            </div>
            <div class="profile-body">
              <h2 class="h4 profile-title">John Smitn</h2>
              <span class="profile-description">President of Ace Contractors Group</span>

              <div class="copy copy-sm">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, quis, assumenda cum aperiam recusandae ab velit natus labore deserunt harum! Et, maxime eveniet sequi aperiam facere rerum est consequuntur qui suscipit ad veniam minima ex alias soluta voluptate ratione totam error fugit quidem sunt. Veritatis, expedita, optio, nisi sunt exercitationem aliquam</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="row">
            <div class="col-xm-6 col-xs-3 col-md-6">
              <div class="block">
                <a href="#">
                  <img src="{{ URL::asset('assets/site/placeholders/people-2.jpg') }}" alt="">
                  <h3 class="block-title h6">Tony Barker</h3>
                </a>
              </div>
            </div>
            <div class="col-xm-6 col-xs-3 col-md-6">
              <div class="block">
                <a href="#">
                  <img src="{{ URL::asset('assets/site/placeholders/people-3.jpg') }}" alt="">
                  <h3 class="block-title h6">Russell Moore</h3>
                </a>
              </div>
            </div>
            <div class="col-xm-6 col-xs-3 col-md-6">
              <div class="block">
                <a href="#">
                  <img src="{{ URL::asset('assets/site/placeholders/people-4.jpg') }}" alt="">
                  <h3 class="block-title h6">Simon Cock</h3>
                </a>
              </div>
            </div>
            <div class="col-xm-6 col-xs-3 col-md-6">
              <div class="block">
                <a href="#">
                  <img src="{{ URL::asset('assets/site/placeholders/people-5.jpg') }}" alt="">
                  <h3 class="block-title h6">Warren Higgs</h3>
                </a>
              </div>
            </div>
          </div>
         
        </div>
      </div>
      <div class="group group-l5">
        <div class="block">
          <a href="#">
            <img src="{{ URL::asset('assets/site/placeholders/people-6.jpg') }}" alt="">
            <h3 class="block-title h6">Warren Higgs</h3>
          </a>
        </div>
        <div class="block">
          <a href="#">
            <img src="{{ URL::asset('assets/site/placeholders/people-5.jpg') }}" alt="">
            <h3 class="block-title h6">Warren Higgs</h3>
          </a>
        </div>
        <div class="block">
          <a href="#">
            <img src="{{ URL::asset('assets/site/placeholders/people-7.jpg') }}" alt="">
            <h3 class="block-title h6">Warren Higgs</h3>
          </a>
        </div>
        <div class="block">
          <a href="#">
            <img src="{{ URL::asset('assets/site/placeholders/people-2.jpg') }}" alt="">
            <h3 class="block-title h6">Warren Higgs</h3>
          </a>
        </div>
        <div class="block">
          <a href="#">
            <img src="{{ URL::asset('assets/site/placeholders/people-3.jpg') }}" alt="">
            <h3 class="block-title h6">Warren Higgs</h3>
          </a>
        </div>
      </div>
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