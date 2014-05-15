@extends('layouts.back')

@section('section-top')
	<!-- Main Content -->
	<div class="section section--top">
		<div class="pull-left mr-15px">
			<h1 class="h3 section__title">
				<i class="fa fa-group mr-5px"></i>
				<span>New Member</span>
			</h1>
		</div>
	</div>
@stop
@section('content')
		{{ Form::open(array('url' => 'admin/member/create', 'autocomplete' => 'off', 'name' => 'gyForm', 'id' => 'gyForm','files' => true)) }}
			{{ Site::system_messages() }}
			{{ Form::hidden('id', $user['id']) }}
			@include("user::user.top")
			<div class="section section--offset">
				<div class="panel panel--offset">
					
					@include("user::user.tab")
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