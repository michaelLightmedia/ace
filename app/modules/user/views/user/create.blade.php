@extends('layouts.back')

@section('section-top')
	<div class="navbar-left">
		<h1 class="page-title">
			<span>User Details</span>
		</h1>
	</div>
@stop
@section('content')
		{{ Form::open(array('url' => 'admin/member/create', 'autocomplete' => 'off', 'name' => 'gyForm', 'id' => 'gyForm','files' => true)) }}
			{{ Site::system_messages() }}
			{{ Form::hidden('id', $user['id']) }}
			@include("user::user.top")
			<div class="section section--offset">
				<div class="panel panel--offset">
					

					@include("user::user.$user[tab]")
					

				</div>
			</div>
		{{ Form::close() }}
<script>
	$('.nav-tabs li').removeClass('active');

	$('#{{ $user["tab"] }}').addClass('active');
</script>
	<!-- Main Footer -->
@stop