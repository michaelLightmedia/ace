@extends('layouts.back')

@section('section-top')
  <div class="section section--top">
    <div class="pull-left mr-15px">
      <h1 class="h3 section__title">
        <i class="fa fa-bar-chart-o mr-5px"></i>
        <span>Reporting</span>
      </h1>
    </div>

    <div class="pull-right search">
      <a href="{{ URL::to('admin/reporting') }}" class="btn btn-default mr-5px btn-default-blue">
        <span>Overview</span>
      </a>
     <!--  <a href="{{ URL::to('admin/sales-report') }}" id="sales-report" class="btn btn-default  mr-5px">
        <span>Sales Report</span>
      </a> -->
      <a href="{{ URL::to('admin/orders-report') }}" id="orders-report" class="btn btn-default mr-5px">
        <span>Sales Order</span>
      </a>
      <a href="{{ URL::to('admin/members-report') }}" id="members-report" class="btn btn-default">
        <span>Member</span>
      </a>
    </div>
  </div>
  <script>
    $(function(){
      $('.pull-right .btn-default').removeClass('btn-default-blue');
        @if(Request::segment(2) != '')
           $('#{{Request::segment(2)}}').addClass('btn-default-blue');
        @else
          $('.pull-right .btn-default:eq(0)').addClass('btn-default-blue');
        @endif
    });
  </script>
@stop
@yield('sub-content')