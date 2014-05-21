@extends('layouts.back')

@section('section-top')
	<!-- Main Content -->
	<div class="section section--top">
		<div class="pull-left mr-15px">
			<h1 class="h3 section__title">
				<i class="fa fa-group mr-5px"></i>
				<span>Edit Member</span>
			</h1>
		</div>
	</div>
@stop


@section('content')
		{{ Site::system_messages() }}
			
			@yield('sub-content')
			
@stop