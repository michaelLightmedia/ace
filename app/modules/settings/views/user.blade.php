@extends('settings::_sidebar')

@section('sub-content')
{{ Form::open(array('url' => 'admin/settings/user', 'files' => true)) }}	
	<div class="panel">
		<div class="panel__heading">
			<h1 class="h4">User Settings</h1>
		</div>
		<div class="panel__sub_content">
			<div class="row">
				<div class="col-lg-8">
					<br />

					<div class="section section--offset">

						<div class="form-group">
							<label for="admin_email" class="label-select-role col-lg-4 col-sm-4 control-label">
				            	Select role
				            	<i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Select role" data-original-title="Select role"></i>
				          	</label>
							<div class="col-lg-8 col-md-7 col-sm-7">
								<div class="selectpicker-fullx">
									{{ Form::select('group',$groups, Input::get('group'), array('class' => 'selectpicker', 'onchange' => 'this.form.submit()')) }}
									{{ Form::button('<i class="fa fa-foursquare mr-5px"></i> select', array('name' => 'submit', 'value' => 'select-group', 'type' => 'submit', 'class' => 'btn btn-info')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="admin_email" class="label-user-cap col-lg-12 col-sm-12 control-label">
				            	User Capabilities
				            	<i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Select capabilities" data-original-title="Select capabilities"></i>
				          	</label>
							<div class="col-lg-12">
								<div class="row">
									<div class="user-capability-lists">
										@foreach($capabilities as $capability)

											<div class="user-capability-lists__item col-lg-4 col-md-6 col-sm-6">
												<label>
													@if(in_array($capability->id, $exists_caps))
														{{ Form::checkbox('capability[]', $capability->id, true) }}
													@else
														{{ Form::checkbox('capability[]', $capability->id, false) }}
													@endif 
													{{ $capability->capability }}
												</label>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>

						
					</div>
				</div>
				<br />
				<div class="col-lg-4">
					<div class="col-lg-12 col-md-12">
						<div class="list-group list-group--2nd">
							<li class="list-group-item">
								<i class="fa fa-check mr-5px"></i>
								<a href="#" class="check-all-caps">Select all</a>
							</li>
							<li class="list-group-item">
								<i class="fa fa-reply-all mr-5px"></i>
								<a href="#" class="uncheck-all-caps">Unselect all</a>
							</li>
							<li class="list-group-item">
								<i class="fa fa-plus mr-5px"></i>
								<a href="{{ URL::to('admin/members/capability/create') }}">Add Capability</a>
							</li>
							<li class="list-group-item">
								{{ Form::button('<i class="fa fa-save mr-5px"></i> Save', array('name' => 'submit', 'value' => 'save', 'type' => 'submit', 'class' => 'btn btn-info')) }}								
							</li>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}
@stop