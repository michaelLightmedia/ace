@extends('reporting::index')

@section('content')
  <!-- Main Content -->
	<div class="section">
		<div class="panel panel-success">
			<div class="panel__heading">
				<h2 class="h4">Sales Order</h2>
			</div>
			<div class="panel__content">
				{{ Form::open(array('url' => 'admin/orders-report')) }}
				<div class="row stroke-bottom">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="selectpicker-full form-group">
							{{ Form::select('filter_order_status', array('-1' => 'Order Status', 'Complete' => 'Completed', 'In Progress' => 'In Progress', 'Cancel' => 'Cancelled'), Input::get('filter_order_status'), array('class' => 'selectpicker')) }}
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="datepicker-wrap form-group">
	                        <div class="row">
	                        	<div class="datepicker-2-cols">
	                        		<div class="col-lg-4 col-sm-4">
	                            		<div class="date datepicker">
	                            			<div class="add-on add-on--from">
	                            				{{ Form::text('filter_from', Input::get('filter_from'), array('class' => 'form-ugly filter_from', 'id' => 'datepicker-from', 'placeholder' => 'from')) }}
		                            		</div>
	                            		</div>
	                            	</div>
	                            	<div class="col-lg-3 col-sm-4 flow-center">
	                            		-
	                            	</div>
	                            	<div class="col-lg-5 col-sm-4">
	                            		<div class="date datepicker">
	                            			<div class="add-on add-on--from">
	                            				{{ Form::text('filter_to', Input::get('filter_to'), array('class' => 'form-ugly filter_to', 'id' => 'datepicker-to', 'placeholder' => 'to')) }}
		                            		</div>
	                            		</div>
	                            	</div>
	                        	</div>
	                        </div>
	                        <div class="datepicker-calendar">
	                            <i class="fa fa-calendar"></i>
	                        </div>
	                    </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="selectpicker-full form-group">
							<select class="selectpicker" name="filter_user_id">
								<option value="-1">Members</option>
								@if( $customers )
									@foreach( $customers as $customer )
										<option value="{{ $customer->id }}" @if( $customer->id == Input::get('filter_user_id')) {{ 'selected="selected"' }} @endif )  >{{ $customer->firstname.' '.$customer->lastname }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<button class="btn btn-default btn-info btn-block">Generate Report</button>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-10 col-sm-10">
						<div class="mt-15px mb-15px">
							<div class="sales-reports-total pull-left">
								<h4 class="sales-reports-total-title">Total</h4>
								<span class="sales-reports-price">${{ Site::formatNumber(Site::getTotalSales()) }}</span>
							</div>
						</div>
					</div>
					<!--<div class="col-lg-2 col-sm-2">
						<div class="mt-15px mb-15px">
							<div class="sales-reports-print pull-right">
								<a href="#" class="btn btn-default js-print">
									<i class="fa fa-print mr-5px"></i>
									Print
								</a>
							</div>
						</div>
					</div>-->
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="section section--offset">
		{{ Form::open(array('url' => 'admin/orders-report', 'method' => 'GET')) }}
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

<script>
    $(function(){
      tableHelper.init("{{ URL::to('admin/orders-report') }}");


    })
  </script>
@stop