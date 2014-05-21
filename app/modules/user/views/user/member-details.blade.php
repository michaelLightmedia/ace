@extends('user::user.template')
@section('section-top')
	<div class="navbar-left">
		<h1 class="page-title">
			<span>User Details</span>
		</h1>
	</div>
@stop
@section('sub-content')
<div class="section section--top">
		<div class="section-left">
			<ul class="action-list">
				<li>
					<a href="{{ URL::to('admin/member/create') }}" class="btn btn-success">
				        <i class="fa fa-plus mr-5px"></i>
				        <span>Add New</span>
			      	</a>
				</li>
			</ul>
		</div>
	</div>
<div class="panel__content panel__content--huge">
	
	<div class="row">
		{{ Form::open(array('files' => true)) }}
		<div class="col-lg-7 col-md-7">
			<div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						{{ Form::text('email', (isset($user['email'])) ? $user['email'] : false , array('class' => 'form-control form-pretty form-pretty--white validate[required]')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						{{ Form::password('password', array('class' => 'form-control form-pretty form-pretty--white', 'id' => 'password')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('confirm_password', 'Confirm Password', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						{{ Form::password('confirm_password', array('class' => 'form-control form-pretty form-pretty--white validate[equals[password]]')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('firstname', 'Firstname', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						{{ Form::text('firstname', (isset($user['firstname'])) ? $user['firstname'] : false , array('class' => 'form-control form-pretty form-pretty--white validate[required]')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('lastname', 'Lastname', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						{{ Form::text('lastname', (isset($user['lastname'])) ? $user['lastname'] : false , array('class' => 'form-control form-pretty form-pretty--white validate[required]')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('gender', 'Gender', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						<div class="selectpicker-full">
							{{ Form::select('gender', array('M' => 'Male', 'F' => 'Female'), $user['gender'],array('class' => 'selectpicker')) }}
						</div>
					</div>
				</div>


				<div class="form-group">
					{{ Form::label('birthdate', 'Birthdate', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						<div class='input-group date datepicker' id="datepicker" >
							{{ Form::text('birthdate', $user['birthdate'], array('class' => 'form-control form-pretty form-pretty--white input-group-addon', 'data-format' => 'YYYY-MM-DD'  )) }}
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('active', 'Status', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						<div class="selectpicker-full">
							{{ Form::select('active', array('1' => 'Active', '0' => 'Inactive'), $user['active'], array('class' => 'selectpicker') ) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('group_id', 'Group', array('class' => 'col-lg-2 col-md-4 col-sm-4 control-label')) }}
					<div class="col-lg-8 col-md-7 col-sm-7">
						<div class="selectpicker-full">
							{{ Form::select('group_id', $groups, $user['group_id'], array('class' => 'selectpicker') ) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-blue btn-pretty pull-right" type="submit"><strong>SAVE</strong></button>
				</div>
				
			</div>
		</div>

		<div class="col-lg-4 col-lg-offset-1 col-md-5">
			<div class="row">
				<div class="block--gray">
					<div class="gravatar-pretty">
						@if( !isset($user['id']) )
							<img src="{{ URL::to(UserHelper::defaultAvatar('40x40')) }}" />
						@else
							<img src="{{ URL::to( UserHelper::avatar( $user['id'], '87x87' ) ) }}" />
						@endif
						<span class="upload-container btn btn-primary">
		                    <span><input type="file" name="avatar" accept="image/*"></span>
		                </span>
					</div>
				</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
<script>
	$(function(){
		var el = $('.nav-tabs');
		$('li',el).removeClass('active');
		$('#membership', el).addClass('active');
	});
</script>
@stop