@extends('layouts.back')

@section('section-top')

<!-- Main Content -->
<div class="navbar-left">
	<h1 class="page-title">
		<span>Categories</span>
	</h1>

	<div class="pull-left search">
		<form class="form-inline form-rounded" role="form">
			<div class="form-group">
				<i class="fa fa-search"></i>
				<input type="text" class="form-control" id="s" name="s" placeholder="Search..">
			</div>
		</form>
	</div>
</div>
@stop
@section('content')
	{{ Site::system_messages() }}
	{{ Form::open(array('url' => 'admin/taxonomy/'.$taxonomy )) }}
	{{ Form::hidden('taxonomy', $taxonomy) }}

	<div class="section section--top">
		<div class="section-left">
			<ul class="action-list">
				<li>
					<button type="submit" class="btn btn-default"><i class="fa fa-edit"></i>
					<span>Update</span></button>
				</li>
			</ul>
			
		</div>
	</div>
	<div class="section section--box">
		<div class="row">
			<div class="col-lg-5 col-md-5">
				<div class="mb-15px">
					{{ Form::text('name', Input::get('name'), array('class' => 'form-control form-control--2nd validate[required]', 'placeholder' => 'Name' )) }}
				</div>
				<div class="mb-15px">
					{{ Form::text('slug', Input::get('slug'), array('class' => 'form-control form-control--2nd', 'placeholder' => 'Slug' )) }}
				</div>
				<div class="mb-15px">
					{{ Form::select('parent', $categories, '0', array('class' => 'form-control form-control--2nd' )) }}
				</div>
				<div class="panel">
					{{ Form::textarea('description', Input::get('description'), array(
					'class' => 'form-control',
					'placeholder' => 'Description',
					'style' => 'width: 100%; height: 200px'
					)) }}
				</div>
			</div>
			<div class="col-lg-7 col-md-7">
				@include('taxonomy::lists')
			</div>
		</div>
	</div>
	{{ Form::close() }}

<!-- Main Footer -->
@stop