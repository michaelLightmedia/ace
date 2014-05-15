@extends('user::user.template')

@section('sub-content')
<div class="panel__heading panel__heading--white">
	<h1 class="h4 text-blue t--huge">CONTACT Details</h1>
</div>
<div class="panel__content panel__content--huge">
	<div class="row">
		{{ Form::open() }}
		<div class="col-lg-8 col-md-8 col-sm-8">
		{{ Form::hidden('tab', 'contact-details') }}
			<div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-lg-2 col-md-5 col-sm-5 control-label')) }}
					<div class="col-lg-10 col-md-7 col-sm-7">
						{{ Form::text('email', (isset($user['email'])) ? $user['email'] : false , array('class' => 'form-control form-pretty form-pretty--white validate[required, custom[email]]')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('mobile', 'Phone/Mobile', array('class' => 'col-lg-2 col-md-5 col-sm-5 control-label')) }}
					<div class="col-lg-10 col-md-7 col-sm-7">
						{{ Form::text('mobile', (isset($user['mobile'])) ? $user['mobile'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('address_1', 'Address 1', array('class' => 'col-lg-2 col-md-5 col-sm-5 control-label')) }}
					<div class="col-lg-10 col-md-7 col-sm-7">
						{{ Form::text('address_1', (isset($user['address_1'])) ? $user['address_1'] : false , array('class' => 'form-control form-pretty form-pretty--white validate[required]')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('address_2', 'Address 2', array('class' => 'col-lg-2 col-md-5 col-sm-5 control-label')) }}
					<div class="col-lg-10 col-md-7 col-sm-7">
						{{ Form::text('address_2', (isset($user['address_2'])) ? $user['address_2'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('state', 'State', array('class' => 'col-lg-2 col-md-5 col-sm-5 control-label')) }}
					<div class="col-lg-10 col-md-7 col-sm-7">
						{{ Form::text('state', (isset($user['state'])) ? $user['state'] : false , array('class' => 'form-control form-pretty form-pretty--white validate[required]')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('postcode', 'Postcode', array('class' => 'col-lg-2 col-md-5 col-sm-5 control-label')) }}
					<div class="col-lg-10 col-md-7 col-sm-7">
						{{ Form::text('postcode', (isset($user['postcode'])) ? $user['postcode'] : false , array('class' => 'form-control form-pretty form-pretty--white validate[required]')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('country', 'Country', array('class' => 'col-lg-2 col-md-5 col-sm-5 control-label')) }}
					<div class="col-lg-10 col-md-7 col-sm-7">
						<div class="selectpicker-full">
							{{ Form::select('country', UserHelper::countries(), $user['country'], array('class' => 'selectpicker selectpicker--country')) }} 
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-blue btn-pretty pull-right" type="submit"><strong>SAVE</strong></button>
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
		$('#contact', el).addClass('active');
	});
</script>
@stop