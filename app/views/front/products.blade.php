@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top">
  <div class="container">
    <div class="pull-left">
      <h1 class="h3 section__title pt-15px">
        {{ $heading }}
      </h1>
    </div>
    <div class="pull-right search--gray">
      <form class="form-inline form-rounded--gray form-rounded" role="form">
        <div class="form-group">
          <i class="fa fa-search"></i>
          {{ Form::text('s', Input::get('s'), array('class' => 'form-control', 'placeholder'=> 'Search '.$heading.'...')) }}
        </div>
      </form>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      {{ Form::open(array('url' => 'cart/add', 'id' => 'cart-form')) }}
        {{ Form::hidden('quantity', 1) }}
        {{ Form::hidden('productCode') }}
      {{ Form::close() }}

      @if( count($products) != 0 )
        @foreach($products as $product)
        <!-- col-xs-6 -->
        <div class="col-xs-6 col-md-4 col-sm-4 col-xs-full">
          <div class="object object--pretty object--pretty-2nd">
            <div class="object__img">
              <div class="object__overlay"></div>
              @if($hasExpiration && !$product['isSoldOut'])
              <div class="simple-counter">
                <span class="simple-counter__title">Time left to buy</span>
                <div id="prod-{{ $product['productCode'] }}" class="object__counter">
                  <span class="countdown_row countdown_show4">
                    <span class="countdown_section">
                      <span class="countdown_date_title">Days</span>
                      <span class="countdown_amount">{{ $product['timer']['d'] }}</span>
                    </span>
                    <span class="countdown_section">
                      <span class="countdown_date_title">Hours</span>
                      <span class="countdown_amount">{{ $product['timer']['h'] }}</span>
                    </span>
                    <span class="countdown_section">
                      <span class="countdown_date_title">Minutes</span>
                      <span class="countdown_amount">{{ $product['timer']['i'] }}</span>
                    </span>
                    <span class="countdown_section">
                      <span class="countdown_date_title">Seconds</span>
                      <span class="countdown_amount">{{ $product['timer']['s'] }}</span>
                    </span>
                  </span>
                </div> 
              </div>
              @endif
              @if($product['post-media'])
                <img src="{{ $product['post-media'] }}" />
              @endif
              <div class="object__meta">@if(isset($product['sale_price'])) {{ Settings::get('prod_currency_symbol').$product['sale_price'] }} @endif</div>
            </div>
            <div class="object__body">
              <h2 class="object__title" title="{{ $product['post_title'] }}">{{ $product['post_excerpt_title'] }}</h2>
              <div class="object__desc">{{ $product['excerpt'] }}</div>
              <div class="object__content">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="list-unstyled list-blocks">
                      <li><span>Worth:</span>@if(isset($product['price'])) {{ Settings::get('prod_currency_symbol').$product['price'] }} @endif</li>
                      <li><span>Payout:</span>@if(isset($product['discount'])) {{ $product['discount'] }}% @endif</li>
                      <li><span>TO GO:</span> <span class="groupbuyQty">@if(isset($product['quantity'])) {{ $product['quantity'] }} @endif</span></li>
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <span class="object__pricing text-blue">@if(isset($product['sale_price'])) {{ Settings::get('prod_currency_symbol').$product['sale_price'] }} @endif</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="object__buttons">
              <div class="btn-group">
                <a href="{{ $product['post_type'].'/'.$product['guid'] }}" class="btn btn-light-blue--2nd">
                  <i class="fa fa-tags mr-5px"></i>
                  View Details</a>
                  @if( $product['isSoldOut'] )
                    <a href="#" class="btn btn-danger"><i class="fa fa-times mr-5px"></i>Sold Out</a>
                  @else
                    <a href="{{ URL::to('cart/add?quantity=1&productCode='.$product['productCode'].'&post_type=groupbuy&returnUrl=groupbuy') }}" class="btn btn-dark-blue addToCart" data-posttype="groupbuy" data-product-code={{ $product['productCode'] }}><i class="fa fa-shopping-cart mr-5px"></i>Buy Now</a>
                  @endif
              </div>
            </div>
          </div>
        </div>
        <!-- /col-xs-6 -->
        @endforeach
      @else
              <strong>Sorry, No results found!</strong>
      @endif
    </div>
    @if($products)
      {{ Site::productPagination($totalItems) }}
    @endif
  </div>
</div>

<script>
  $(function(){
      var prodCntr = new Array();
      @foreach($products as $product)
        prodCntr.push({'{{ $product['productCode'] }}':'{{$product['deal_end']}}'});
      @endforeach
      var tstrq = "{{ Settings::get('timeStartToReduceQty') }}";
      var prodCntr=JSON.stringify(prodCntr);JSON.parse(prodCntr,function(e,t){var n=t.toString().split(",");var r=new Date(n[0],n[1]-1,n[2],n[3],n[4],n[5]);var i=$("#prod-"+e);i.countdown({until:new Date(r),format:"dHMS",tickInterval:10,onTick:function(t){var n=tstrq.split(":");if(t[3]==0&&t[4]<=n[0]){$.ajax({url:baseURL+"countdown",type:"post",data:{code:e},dataType:"json",success:function(e){if(e.quantity==0){i.closest(".col-xs-6").find(".addToCart").replaceWith('<a class="btn btn-danger" href="#"><i class="fa fa-times mr-5px"></i>Sold Out</a>')}i.closest(".col-xs-6").find(".groupbuyQty").text(e.quantity);/*console.log(e)*/}})}}})});

  });
</script>


@stop