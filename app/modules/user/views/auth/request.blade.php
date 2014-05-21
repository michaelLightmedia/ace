@extends('layouts.auth_master')

@section('content')
	
	<div class="banner banner-home banner-l3 banner-full">
	    <div class="container">
	        <div class="banner-form banner-form-show">
				<div class="banner-heading-l2">
		            <h1 class="title">Forgot your password?</h1>
		            
	            </div>

	            {{ Form::open(array('route' => 'user/request', 'id' => 'gyForm', 'role' => 'form', 'class' => 'form-horizontal',  'autocomplete' => 'off')) }}

	                <div class="form-login">
	    
	                		<p>We'll email your intructions on how to reset your password.</p>
					        <div class="form-group form-group-lg form-group-icon js-validator">
						        <span class="gytbo gytbo-email"></span>
						        {{ Form::text('email', Input::get('email'), array('class' => 'form-control validate[required, custom[email]]', 'placeholder' => 'exampl@email.com', 'autofocus')) }}
						        <span class="validator-message"></span>    
					        </div>


					    <div class="form-group form-group-action">
					        {{ Form::submit('Reset new password', array('class' => 'btn btn-primary btn-block btn-lg btn-in')) }}
					    </div>

					</div>
	            	{{ Site::system_messages() }}
	
				{{ Form::close() }}

	            <div class="banner-form-footer">
	                <p><a href="{{ URL::to('/login') }}">Return to Login</a></p>
	            </div>

	        </div>
	    </div>
	</div>

	<!-- <a href="{{ URL::to('/') }}">&larr; Back to Sitetbo</a> -->
		
@stop