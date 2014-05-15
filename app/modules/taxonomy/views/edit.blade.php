@extends('layouts.back')

@section('section-top')

<!-- Main Content -->
<div class="section section--top">
	<div class="pull-left mr-15px">
      <h1 class="h3 section__title">
        <i class="fa fa-group mr-5px"></i>
        <span>Categories</span>
      </h1>
    </div>
	<div class="pull-left">
      <a href="{{ URL::to('admin/taxonomy/'.$category['taxonomy']) }}" class="btn btn-blue btn-uc btn-sm-2nd mt-5px">
        <i class="fa fa-plus mr-5px"></i>
        <span>Add New</span>
      </a>
    </div>
	
	<div class="pull-right search">
		{{ $lists->search_box() }}
	</div>
</div>
@stop
@section('content')
	{{ Site::system_messages() }}
	{{ Form::open(array('url' => 'admin/taxonomy/'.$category['taxonomy'].'/'.$category['term_id'].'/edit' )) }}
	{{ Form::hidden('taxonomy', 'category') }}
	<div class="section">
		<div class="pull-left">
			<button type="submit" class="btn btn-default"><i class="fa fa-edit"></i>
				<span>Update</span></button>
		</div>
	</div>
	<div class="section section--offset">
		<div class="row">
			<div class="col-lg-5 col-md-5">
				<div class="mb-15px">
					{{ Form::text('name', $category['name'], array('class' => 'form-control form-control--2nd validate[required]', 'placeholder' => 'Name' )) }}
				</div>
				<div class="mb-15px">
					{{ Form::text('slug', $category['slug'], array('class' => 'form-control form-control--2nd', 'placeholder' => 'Slug' )) }}
				</div>
				<div class="mb-15px">
					{{ Form::select('parent', $categories, $category['parent'] , array('class' => 'form-control form-control--2nd' )) }}
				</div>
				<div class="panel">
					{{ Form::textarea('description', $category['description'], array(
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