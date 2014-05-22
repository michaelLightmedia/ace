@extends('layouts.back')

@section('section-top')
<!-- Main Content -->
<div class="section section--top">
	<div class="pull-left">
		<h1 class="h3 section__title">
			<i class="fa fa-clock-o mr-5px"></i>
			<span>Upload New Media</span>
		</h1>
	</div>
</div>
@stop
@section('content')

<div class="t-content">
	{{ Site::system_messages() }}
	@include('media::uploader')
</div>

@stop