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

<br />
<br />
<br />
		{{ Site::system_messages() }}
			
			<div class="section section--offset">
				<div class="panel panel--offset">

					@yield('sub-content')
					

				</div>
			</div>
@stop