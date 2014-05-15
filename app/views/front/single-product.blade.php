@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top">
  {{ Site::system_messages() }}
  @if($post['hasTimer'])
  <div class="object object--ribbon"></div>
  @endif
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-7 col-sm-7">
        <div class="panel panel--omega">
          <div class="panel__heading panel__heading--md">
            <h1>{{ $post['post_title'] }}</h1>
          </div>
          <div class="panel__content panel__content--offset">
            <div class="video-wrapper">
              {{ $post['post-media'] }}
            </div>
          </div>
        </div>
        <div class="formatted">
          <!-- AddThis Button BEGIN -->
          <div class="addthis_toolbox addthis_default_style ">
          <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:width="215" ></a>
          <a class="addthis_button_tweet"></a>
          <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
          <a class="addthis_counter addthis_pill_style"></a>
          </div>
          <!-- AddThis Button END -->
        </div>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-5">
        <ul class="nav nav-tabs nav-tabs--pretty nav-tabs--small">
          <li class="active">
            <a href="#group-deals-pricing" data-toggle="tab">
              Pricing
              <span class="fa-triangle"></span>
            </a>
          </li>
          <li>
            <a href="#group-deals-details" data-toggle="tab">
              Detail
              <span class="fa-triangle"></span>
            </a>
          </li>
          <li>
            <a href="#group-deals-terms" data-toggle="tab">
              Terms
              <span class="fa-triangle"></span>
            </a>
          </li>
          <li class="pull-right">
            <a href="#" data-post-id="{{ $post['id'] }}" class="btn btn-orange btn-pretty" id="share">
              <i class="fa fa-share-square-o mr-5px"></i>
              <strong>SHARE</strong>
            </a>
          </li>
          
        </ul>
        <!-- / Listings -->
        <div class="tab-content">
          
          <div id="group-deals-pricing" class="tab-pane fade in active">
            {{ Form::open(array('url' => 'cart/add', 'id' => 'addToCartForm')) }}
            {{ Form::hidden('post_id',$post['id'], array('id' => 'post_id')) }}
            {{ Form::hidden('productCode',$post['productCode']) }}
            {{ Form::hidden('post_type','groupbuy') }}
            {{ Form::hidden('returnUrl', Site::curPageURL() ) }}
            <div class="box">
              <div class="box__pricing">
                <div class="row">
                  <div class="col-md-12">
                    <h1 class="box__pricing-static">
                      <span class="icon-pricing">{{ Settings::get('prod_currency_symbol') }}</span>
                      <span class="pricing-value js-pricing-value">{{ Sitetbo::formatNumber($post['productPrice']); }}</span>
                    </h1>
                  </div>
                </div>
                <ul class="list-inline list-inline--2nd">
                  <li>
                    Worth: <span class="badge badge-gray js-badge--worth text-blue">{{ Settings::get('prod_currency_symbol').$post['price'] }}</span>
                  </li>
                  <li class="unoffset"><span class="text-blue">|</span></li>
                  <li>
                    Payout: <span class="badge badge-gray js-badge--percent text-blue">{{ $post['discount'] }}%</span>
                  </li>
                  <li class="unoffset"><span class="text-blue">|</span></li>
                  <li>
                    To Go: <span class="badge badge-gray js-badge--percent text-blue groupbuyQty">{{ $post['quantity'] }}</span>
                  </li>
                </ul>
              </div>
             
              <div class="box__counter">
                @if($post['isSoldOut'])
                 <span class="pricing-value js-pricing-value">Sold Out</span>
                @else
                   @if($post['hasTimer'])
                  <div class="box__counter-title">
                    <h3 class="h4">Hurry! Time left to buy:</h3>
                  </div>
                  <div class="box__counter-content">
                    <div class="row">
                      {{ Form::hidden('deal_end', $post['deal_end']) }}
                      <!-- <div id="box-counter"></div> -->
                    </div>
                  </div>
                  <div id="prod-{{ $post['productCode'] }}" class="countdown">
                    <span class="countdown_row countdown_show4">
                      <span class="countdown_section">
                        <span class="countdown_date_title">Days</span>
                        <span class="countdown_amount">{{ $post['timer']['d'] }}</span>
                      </span>
                      <span class="countdown_section">
                        <span class="countdown_date_title">Hours</span>
                        <span class="countdown_amount">{{ $post['timer']['h'] }}</span>
                      </span>
                      <span class="countdown_section">
                        <span class="countdown_date_title">Minutes</span>
                        <span class="countdown_amount">{{ $post['timer']['i'] }}</span>
                      </span>
                      <span class="countdown_section">
                        <span class="countdown_date_title">Seconds</span>
                        <span class="countdown_amount">{{ $post['timer']['s'] }}</span>
                      </span>
                    </span>
                  </div>
                  @endif
                  <div class="box__counter-sessions">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4 session-left">I want</div>
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        {{ Form::hidden('sale_price', (float)$post['poroductPayout'], array('id' => 'sale_price')) }}
                        {{ Form::hidden('price', (float)$post['productPrice'], array('id' => 'prod_price')) }}
                        {{ Form::text('quantity', 1, array('class' => 'form-control form-pretty form-pretty--white')) }}
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4 session-right">Sessions</div>
                    </div>
                  </div>
                @endif
              </div>
              
              <div class="box__total-price">
                <div class="row">
                  <div class="col-sm-7 col-md-7 col-xs-6">
                    <div class="box__total-price-desc">
                      <div class="box__pricing-static">
                        <div class="icon-pricing">$</div>
                        <div class="subtotal-sale-value pricing-value js-pricing-value pricing-value--small text-blue">0.00</div>
                      </div>
                    </div>
                    <div class="box__total-price-worth">
                      Payout <span class="text-blue">{{ $post['discount'] }}%</span>
                    </div>
                  </div>
                  <div class="col-sm-5 col-md-5 col-xs-6">
                    <div class="box__button pull-right">
                      @if($post['isSoldOut'])
                        <a class="btn btn-danger btn-md btn-pretty"><i class="fa fa-times mr-5px"></i>Sold Out</a>
                      @else
                        {{ Form::button('<strong>Buy Now</strong>', array('type' => 'submit', 'class' => 'btn btn-orange btn-md btn-pretty buynow')) }}
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @if($post['hasTimer'])
              <div class="pull-left">
                <a href="{{ URL::to('/how-it-works') }}" target="_blank" class="box-link text-blue">How it works</a>
              </div>
              @if(!$post['isSoldOut'])
              <div class="pull-right">
                <span class="text-gray">{{ $post['quantity'] }} treatments to activate deal</span>
              </div>
              @endif
            @endif
            {{ Form::close() }}
          </div>
          
          <!-- / Group Deals Pricing -->
          <div id="group-deals-details" class="tab-pane fade in">
            <div class="box">
              <div class="box__content box__content--scroller">
                {{ $post['post_content'] }}
              </div>
            </div>
          </div>
          <!-- Tab Details -->
          <div id="group-deals-comments" class="tab-pane fade in">
            <div class="box">
              <div class="box__content">
                
              </div>
            </div>
          </div>
          <!-- / Tab Comments -->
          <div id="group-deals-share" class="tab-pane fade in">
            <div class="box">
              <div class="box__headings">
                <h3 class="h4 box__title text-blue">Share</h3>
              </div>
              <div class="box__content box__content--pretty">
                <div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="Your Friend's Name" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="Your Friend's Name" >
                    </div>
                  </div>
                  <div class="form-group m-omega-b">
                    <div class="col-md-12">
                      <textarea name="" id="" cols="30" rows="8" class="form-control form-pretty form-pretty--white" placeholder="Your Personalised Message (can leave blank)"></textarea>
                    </div>
                  </div>
                </div>
                <!-- / Form Horizontal -->
              </div>
              <div class="box__footer">
                <div class="pull-right">
                  <button class="btn btn-blue btn-pretty">
                    <strong>Send</strong>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- / Tab Share -->
          <div id="group-deals-terms" class="tab-pane fade in">
            <div class="box">
              <div class="box__content box__content--scroller">
                {{ $post['product_terms_and_conditions'] }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section section--unoffset-lr section--offset-top-huge">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="timeline-messages-listing">
          <h3 class="timeline-title">Comments</h3>
          <div class="timeline-messages"></div>
        </div>
        <!-- Timeline Messages -->
          @if(Auth::check() && Auth::User()->group->hasRole('add_comment'))
          <!--Timeline Messages -->                  
          <div class="chat-form">
            {{ Form::open(array('url' => 'post/comment')) }}
            <div class="input-cont ">
              {{ Form::textarea('comment', Input::get('comment'), array('cols' => '30', 'rows' => '4', 'class' => 'form-control form-pretty form-pretty--white col-lg-12','placeholder' => 'Type a message here...','id' => 'comment')) }}
            </div>
            <div class="form-group">
              <div class="pull-right chat-features">
                  <a href="javascript:;">
                      <i class="icon-camera"></i>
                  </a>
                  <a href="javascript:;">
                      <i class="icon-link"></i>
                  </a>
                  {{ Form::button('Send', array('class' => 'btn btn-blue btn-pretty btn-chat', 'id' => 'send-comment')) }}
              </div>
            </div>
            {{ Form::close() }}
          </div>
          @endif
      </div>
      @if(Auth::check())
      <div class="col-lg-4">
        <div class="panel">
          <div class="panel__heading panel__heading--gray">
            <h3 class="h4 panel__title">Recently Viewed <span class="text-blue">Deals</span></h3>
          </div>
          <div class="panel__content panel__content--offset block block--pretty">
            {{ Form::open(array('url' => 'cart/add', 'id' => 'cart-form')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('productCode') }}
              {{ Form::close() }}
            
              @foreach(PostRecentlyViewed::getProductRecentlyViewed(Auth::User()->id, $post['post_type']) as $item)
              <div class="block__item">
                <div class="block__img">
                  <img width="120" src="{{ $item['post-media'] }}" alt="">
                </div>
                <h3 class="h5 block__title">{{ $item['post_excerpt_title'] }}</h3>
                <span class="block__meta">$25.00</span>
                <div class="btn-group btn-group-sm">
                  <a href="{{ URL::to($item['post_type'].'/'.$item['guid']) }}" class="btn btn-light-blue--2nd">Details</a>
                  @if( $item['isSoldOut'] )
                    <a href="#" class="btn btn-danger"><i class="fa fa-times mr-5px"></i>Sold Out</a>
                  @else
                    <a href="{{ URL::to('cart/add?quantity=1&productCode='.$item['productCode'].'&returnUrl='. $item['post_type']) }}" class="btn btn-dark-blue addToCart" data-posttype="groupbuy" data-product-code={{ $item['productCode'] }}>Buy Now</a>
                  @endif
                </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>

<script>
  $(function(){
    cskMain.Comment.init();
    @if($post['hasTimer'])
      var counter=$(".box__counter");var self=$(this);var date="{{ $post['deal_end'] }}";var tstrq="{{ Settings::get('timeStartToReduceQty') }}";date=date.toString().split(",");var dateArray=new Date(date[0],date[1]-1,date[2],date[3],date[4],date[5]);counter.find(".countdown").countdown({until:new Date(dateArray),format:"dHMS",tickInterval:10,onTick:function(e){var t=tstrq.split(":");if(e[3]==0&&e[4]<=t[0]){$.ajax({url:baseURL+"countdown",type:"post",data:{code:"{{ $post['productCode'] }}"},dataType:"json",success:function(e){if(e.quantity==0){counter.closest("#group-deals-pricing").find(".buynow").replaceWith('<a class="btn btn-md btn-danger" href="#"><i class="fa fa-times mr-5px"></i>Sold Out</a>')}counter.closest("#group-deals-pricing").find(".groupbuyQty").text(e.quantity);console.log(e)}})}}});
    @endif

    $('input[name^="quantity"]').keyup(function(e){

      var self = $(this);
      var qty = self.val();

      var price = $('input#prod_price').val();
      var sprice = $('input#sale_price').val();

      var total = parseFloat(price) * parseInt(qty);
      total = isNaN(total) ? 0 : total;

      var stotal = parseFloat(sprice) * parseInt(qty);
      stotal = isNaN(stotal) ? 0 : stotal;

      $('.subtotal-value').text(total);
      $('.subtotal-sale-value').text(stotal);

    }).trigger('keyup');
  });
</script>
@stop