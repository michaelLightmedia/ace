@extends('user::customer.profile')

@section('sub-content')
<div class="panel">

	<div class="panel__heading panel__heading--huge">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="h2 t--huge">Your Loyalty Points</h1>
			</div>
			<div class="col-sm-6">
				<div class="search-default pull-right">
					{{ $lists->search_box() }}
				</div>
			</div>
		</div>
		
	</div>

	{{ Form::open(array('url' => 'customer/profile/points', 'method' => 'GET')) }}

		<div class="panel__content panel__content--offset">

			{{ $lists->prepare_items() }}
			{{ $lists->display( false ) }}

		</div>

		<div class="panel-footer">
			<div class="row">
				<div class="col-sm-6">
					{{ $lists->pagination() }}
					{{ $lists->pagination_info() }}
				</div>
				<div class="col-sm-6">
					{{ $lists->records_per_page() }}
				</div>
			</div>      	
		</div>      


	{{ Form::close() }}


	<div class="section section--stroke">
		<div class="pull-left">
			<h1 class="h3 section__title">
		      Total Points: <span class="text-blue">{{ Auth::User()->points }}</span>
		    </h1>
	    </div>

	    <div class="panel__links pull-right">
			<a href="{{ URL::to('how-to-earn-gy-points') }}" class="btn btn-lg btn-blue">
				<strong>How to Earn Sitetbo Points</strong>
			</a>
			<a href="{{ URL::to('how-to-redeem-gy-points') }}" class="btn btn-lg btn-orange">
				<strong>How to redeem Sitetbo Points</strong>
			</a>
		</div>
	</div>

</div>
<script>
    $(function(){
      tableHelper.init("{{ URL::to('customer/profile/points') }}");
      
      var el = $('.nav-tabs');
		$('li',el).removeClass('active');
		$('#points', el).addClass('active');
    });
</script>

@stop