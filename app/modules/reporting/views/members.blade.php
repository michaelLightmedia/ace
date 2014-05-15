@extends('reporting::index')

@section('content')
  <!-- Main Content -->
<div class="t-content">
				<div class="section">
					<div class="panel panel-success">
						<div class="panel__heading">
							<h2 class="h4">Sales Orders</h2>
						</div>
						<div class="panel__content">
							{{ Form::open(array('url' => 'admin/members-report')) }}
							<div class="row stroke-bottom">
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
			                            <input type="text" class="form-control" placeholder="">
			                            <div class="datepicker-calendar">
			                                <i class="fa fa-calendar"></i>
			                            </div>
			                        </div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="selectpicker-full form-group">
											<select class="selectpicker" name="filter_group">
												<option value="-1" >Groups</option>
												@foreach($groups as $group)
													<option value="{{ $group->id }}" @if( $group->id  == Input::get('filter_group') ) {{ 'selected="selected"' }} @endif >{{ $group->group }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-lg-3 col-md-6 col-sm-6">
									<div class="form-group">
										<div class="selectpicker-full form-group">
											{{ Form::select('filter_active', array('-1' => 'Memberships', '0' => 'In Active', '1' => 'Active'), Input::get('filter_active'), array('class' => 'selectpicker')) }}
										</div>
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
											<span class="sales-reports-price">{{ Site::getTotalMembers() }}</span>
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
					{{ Form::open(array('url' => 'admin/members-report', 'method' => 'GET')) }}
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
		      tableHelper.init("{{ URL::to('admin/members-report') }}");
		    })
		  </script>
@stop