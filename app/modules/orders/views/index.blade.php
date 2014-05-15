@extends('layouts.back')

@section('section-top')
  <div class="section section--top">
    <div class="pull-left mr-15px">
      <h1 class="h3 section__title">
        <i class="fa fa-clock-o mr-5px"></i>
        <span>Orders</span>
      </h1>
    </div>
    {{ $lists->search_box() }}
  </div>
@stop
@section('content')
<!-- Main Content -->
  {{ Site::system_messages() }}
    <div class="section section--stroke">
     <div class="pull-left  mr-15px">
        <a onclick="cskAdmin.BootrstrapAlert.xdelete('admin/orders/delete', 'Orders');return false;" class="delete-post btn btn-default">
          <i class="fa fa-trash-o"></i>
          <span>Delete</span>
        </a>
      </div>
      <div class="pull-left  mr-15px">
        <div class="selectpicker-full">
          {{ Form::select('order_status',
            array(
            '-1'            => '--Order Status--',
            'In Progress'   => 'In Progress', 
            'Cancel'    => 'Cancel', 
            'Complete'    => 'Complete'
            ), 0 ,array('class' => 'selectpicker', 'onchange' => 'cskAdmin.BootrstrapAlert.xActivate(this, "admin/order/order-status", "Member");'));
          }}
        </div>
      </div>
      <div class="pull-left  mr-15px">
        <div class="selectpicker-full">
          {{ Form::select('payment_status',
            array(
            '-1'            => '--Payment Status--',
            'Completed'    => 'Completed',
            'Pending'    => 'Pending'
            ), 0 ,array('class' => 'selectpicker', 'onchange' => 'cskAdmin.BootrstrapAlert.xActivate(this, "admin/order/payment-status", "Member");'));
          }}
        </div>
      </div>


      <div class="pull-right">
        <div class="selectpicker-sm">
          {{ $lists->records_per_page() }}
        </div>
      </div>
    </div>
    <div class="section section--box">
      <div class="row">
        {{ Form::open(array('url' => 'admin/dashboard', 'method' => 'GET')) }}
        <div class="section section--offset">
            {{ $lists->prepare_items() }}
            {{ $lists->display() }}
          
          <div class="pull-left">
            <div class="table-results">
              {{ $lists->pagination_info() }}
            </div>
          </div>
          <div class="pull-right">    
            {{ $lists->pagination() }}
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>

  <script>
    $(function(){
      tableHelper.init("{{ URL::to('admin/orders') }}");
    })
  </script>
@stop