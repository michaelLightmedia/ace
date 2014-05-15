@extends('layouts.back')

@section('section-top')
	<!-- Main Content -->
	<div class="section section--top">
		<div class="pull-left mr-15px">
			<h1 class="h3 section__title">
				<i class="fa fa-group mr-5px"></i>
				<span>New Capability</span>
			</h1>
		</div>
	</div>
@stop
@section('content')
		{{ Site::system_messages() }}
		<div class="col-lg-7">	
			{{ Form::open(array('url' => 'admin/members/capability/create')) }}
			<div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
				<div class="form-group">
					{{ Form::label('capability', 'Capability', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						{{ Form::text('capability', \Input::get('capability'), array('class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
					<div class="pull-right col-lg-8 col-md-7 col-sm-7">
						<button name="action" type="submit" value="save" class="btn btn-default mr-5px"><i class="fa fa-edit"></i>&nbsp;<span>Save</span></button>							</div>
				</div>
			</div>
			{{ Form::close() }}
		</div>
@stop