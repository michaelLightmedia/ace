@extends('user::customer.profile')

@section('sub-content')

<div class="panel">
	<div class="panel__heading panel__heading--huge">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="h2 t--huge">Your Friends</h1>
			</div>
			<div class="col-sm-6">
				<div class="search-default pull-right">
					{{ $lists->search_box() }}
				</div>
			</div>
		</div>		
	</div>
	

	{{ Form::open(array('url' => 'customer/profile/friends', 'method' => 'GET')) }}

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

</div>
<script>
    $(function(){
      tableHelper.init("{{ URL::to('customer/profile/friends') }}");
      
      var el = $('.nav-tabs');
		$('li',el).removeClass('active');
		$('#friends', el).addClass('active');
    });
</script>
@stop