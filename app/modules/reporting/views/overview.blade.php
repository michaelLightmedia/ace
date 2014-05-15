@extends('reporting::index')

@section('content')

  <!-- Main Content -->
    <div class="section">
      <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
          <div class="panel overview__item overview__item--terques">
            <div class="symbol terques">
              <i class="fa fa-user"></i>
            </div>
            <div class="value">
              <h1 class="value__new-members">{{ Site::getTotalNewMembers( date('m') ) }}</h1>
              <p>New Members</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="panel overview__item overview__item--red">
            <div class="symbol red">
              <i class="fa fa-tags"></i>
            </div>
            <div class="value">
              <h1 class="value__sales">{{ Site::getTotalSales() }}</h1>
              <p>Total Sales</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="panel overview__item overview__item--yellow">
            <div class="symbol orange">
              <i class="fa fa-group"></i>
            </div>
            <div class="value">
              <h1 class="value__members">{{ Site::getTotalMembers(  ) }}</h1>
              <p>Members</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="panel overview__item overview__item--blue">
            <div class="symbol blue">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
              <h1 class="value__profit">{{ Site::getTotalMonthSales( date('m') ) }}</h1>
              <p>Sales for this month</p>
            </div>
          </div>
        </div>
      </div>
      <!-- / State Overview -->
      <div class="row">
        <div class="col-lg-12 col-sm-12">
          <div class="border-head">
            <h3>Earning Graph</h3>
          </div>
          <div class="bar-chart">

            <!--custom chart start-->
            <div class="custom-bar-chart">
              @foreach( $earningGraphs as $earning )
              <div class="bar">
                <div class="title">{{ $earning->month_order }}</div>
                <div class="value tooltips" data-original-title="@if( $earning->total_order > 100 ){{ 100 }}@else{{ (int)$earning->total_order  }}@endif%" data-toggle="tooltip" data-placement="top">@if( $earning->total_order > 100 ){{ 100 }}@else{{ (int)$earning->total_order  }}@endif%</div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- / Main Chart -->
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <div class="panel terques-chart">
            <div class="panel-body chart-texture">
              <div class="chart">
                <div class="heading">
                  <span>Today</span>
                  <strong>{{ (Site::getTotalTodaySales( date('m') ) / $maxSale) * 100 }}%</strong>
                </div>
                <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[{{ implode(',', Site::todaySales()) }}]"></div>
              </div>
            </div>
            <div class="chart-tittle">
              <span class="title">Total Earning</span>
              <span class="value">$ {{ Site::getTotalTodaySales() }}</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="panel green-chart">
            <div class="panel-body">
              <div class="chart">
                <div class="heading">
                  <span>This Month</span>
                  <strong>{{ (Site::getTotalMonthSales( date('m') ) / $maxSale) * 100 }}%</strong>
                </div>
              <div id="barchart"></div>

              <!-- <div class="sparkline" data-type="bar" data-barWidth="50" data-resize="true" data-height="75" data-width="90%" data-line-width="5" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[{{ implode(',', Site::todaySales()) }}]"></div> -->
              </div>
            </div>
            <div class="chart-tittle">
              <span class="title">Total Earning</span>
              <span class="value">${{ Site::getTotalMonthSales( date('m') ) }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>




@stop
@section('footer')
@parent
<script src="{{ URL::to('assets/admin/js/plugins/jquery.sparkline.js') }}"></script>
  <script src="{{ URL::to('assets/admin/js/plugins/jquery.easy-pie-chart.js') }}"></script>
  <!--<script src="{{ URL::to('assets/admin/js/plugins/sparkline-chart.js') }}"></script>
  <script src="{{ URL::to('assets/admin/js/plugins/easy-pie-chart.js') }}"></script>-->
    <script>


      $(".sparkline").each(function(){
            var $data = $(this).data();

            $data.valueSpots = {'0:': $data.spotColor};

            $(this).sparkline( $data.data || "html", $data,
            {

            });




        });

    //sparkline chart

        $("#barchart").sparkline([{{ implode(',', Site::thisMonthSales()) }}], {
            type: 'bar',
            height: '90',
            barWidth: 8,
            barSpacing: 5,
            barColor: '#fff'

        });
      // custom bar chart
        if ($(".custom-bar-chart")) {
            $(".bar").each(function () {
                var i = $(this).find(".value").html();
                console.log(i);

                $(this).find(".value").html("");
                $(this).find(".value").animate({
                    height: i
                }, 1000)
            })
        }

        $('.tooltips').tooltip();

      $(function(){
        (function($) {
            $.fn.countTo = function(options) {
                // merge the default plugin settings with the custom options
                options = $.extend({}, $.fn.countTo.defaults, options || {});

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(options.speed / options.refreshInterval),
                    increment = (options.to - options.from) / loops;

                return $(this).each(function() {
                    var _this = this,
                        loopCount = 0,
                        value = options.from,
                        interval = setInterval(updateTimer, options.refreshInterval);

                    function updateTimer() {
                        value += increment;
                        loopCount++;
                        $(_this).html(value.toFixed(options.decimals));

                        if (typeof(options.onUpdate) == 'function') {
                            options.onUpdate.call(_this, value);
                        }

                        if (loopCount >= loops) {
                            clearInterval(interval);
                            value = options.to;

                            if (typeof(options.onComplete) == 'function') {
                                options.onComplete.call(_this, value);
                            }
                        }
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: 0,  // the number the element should start at
                to: 100,  // the number the element should end at
                speed: 1000,  // how long it should take to count between the target numbers
                refreshInterval: 100,  // how often the element should be updated
                decimals: 0,  // the number of decimal places to show
                onUpdate: null,  // callback method for every time the element is updated,
                onComplete: null,  // callback method for when the element finishes updating
            };
        })(jQuery);

        jQuery(function($) {
              $('.value__new-members').countTo({
                  from: 0,
                  to: @if ( Site::getTotalNewMembers( date('m') ) ) {{ Site::getTotalNewMembers( date('m') ) }} @else {{ '0' }} @endif,
                  speed: 1000,
                  refreshInterval: 50,
                  onComplete: function(value) {
                      console.debug(this);
                  }
              });

              $('.value__sales').countTo({
                  from: 0,
                  to: @if ( Site::getTotalNewMembers( date('m') ) ) {{ Site::getTotalSales() }} @else {{ '0' }} @endif,
                  speed: 1000,
                  refreshInterval: 50,
                  onComplete: function(value) {
                      console.debug(this);
                  }
              });

              $('.value__members').countTo({
                  from: 0,
                  to: {{ Site::getTotalMembers() }},
                  speed: 1000,
                  refreshInterval: 50,
                  onComplete: function(value) {
                      console.debug(this);
                  }
              });

              $('.value__profit').countTo({
                  from: 0,
                  to: {{ Site::getTotalMonthSales( date('m') ) }},
                  speed: 1000,
                  refreshInterval: 50,
                  onComplete: function(value) {
                      console.debug(this);
                  }
              });
          });
      });//]]>  

      </script>
@stop