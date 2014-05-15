@extends('layouts.back')

@section('section-top')
<div class="section section--top">
  <div class="pull-left">
    <h1 class="h3 section__title">
      <i class="fa fa-shopping-cart mr-5px"></i>
      <span>Order</span>
    </h1>
  </div>
  <div class="pull-left mt-2px ml-10px">
    <a href="#" class="text-blue fs-24px">#{{$order->id}}</a>
  </div>
  {{ $lists->search_box() }}
</div>
@stop
@section('content')
<!-- Main Content -->
    <div class="section">
      <div class="row">
        <div class="col-lg-9 col-md-9">
          <div class="section section--stroke">
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
        </div>
        <div class="col-lg-3 col-md-3">
         

            @if( $user )
             <div class="panel">
              <div class="panel__heading panel__heading--small">
                <div class="gravatar-small">
                 {{ HTML::image( UserHelper::avatar($order->user_id, '40x40') ) }}
                </div>
                <div class="mt-5px ml-10px fs-16px">
                  <strong>{{ $user->firstname.' '.$user->lastname }}</strong>
                </div>
              </div>
              <div class="panel__content panel__content--offset">
                <ul class="list-group list-group--ugly">
                  <li class="list-group-item">
                    <i class="fa fa-certificate mr-7px fs-16px"></i>
                    {{ Level::find($user->level_id)->name }}
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-envelope-o mr-5px"></i>
                    <a href="#">{{ $user->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-map-marker mr-7px fs-20px"></i>
                    {{ $user->address_1 }}
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-mobile-phone mr-7px fs-20px"></i>
                    <span class="text-blue">{{ $user->mobile }}</span>
                  </li>
                </ul>
              </div>
            </div>
            @else
            <div class="panel__content panel__content--offset">
              <div class="alert alert-omega alert-small alert-danger fade in">
                <p class="text-danger">This customer is deleted.</p>
              </div>
            </div>
            @endif

          
        </div>
      </div>
    </div>

<script>
  $(function(){
    tableHelper.init("{{ URL::to('admin/order/'.$order->id.'/details') }}");
  });
</script>
@stop