@extends('user::customer.profile')

@section('sub-content')
<div class="panel">
	<div class="panel__heading panel__heading--huge">
		<div class="pull-left">
			<h1 class="h2 t--huge">Your Purchase</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="section section--stroke">
		      <div class="pull-left">
		        <div class="selectpicker-sm">
		          {{ $lists->records_per_page() }}
		        </div>
		      </div>
		      {{ $lists->search_box() }}
		    </div>
				{{ Form::open(array('url' => 'customer/profile/purchases', 'method' => 'GET')) }}
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
<script>
    $(function(){
      tableHelper.init("{{ URL::to('customer/profile/purchases') }}");
      
      var el = $('.nav-tabs');
		$('li',el).removeClass('active');
		$('#purchases', el).addClass('active');
    });
</script>
@stop