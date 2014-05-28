@extends('layouts.back')

@section('section-top')
	<div class="navbar-left">
		<h1 class="page-title">
			<i class="fa fa-bullhorn mr-5px"></i>
			<span>Edit Policy</span>
		</h1>
	</div>
@stop

@section('content')
	<div class="section section--top">
		<div class="section-left">
			<ul class="action-list">
				<li>
					<a href="{{ URL::to('admin/policy/create') }}" class="btn btn-success">
				        <i class="fa fa-plus mr-5px"></i>
				        <span>Add New</span>
			      	</a>
				</li>
			</ul>
		</div>
	</div>

	{{ Site::system_messages() }}
	
	{{ Form::open(array('url' => 'admin/policy/'.$post['id'].'/edit', 'id' => 'post-form' )) }}
	{{ Form::hidden('post_type', 'policy') }}
	{{ Form::hidden('id', $post['id'], array('id' => 'post_id')) }}
	{{ Form::hidden('comment_status', 'open') }}
	{{ Form::hidden('post_parent', '0') }}
	{{ Form::hidden('post_date', date('Y-m-d H:i:s')) }}
	{{ Form::hidden('guid', 'admin/policy/create') }}
	{{ Form::hidden('post_mimetype', '') }}
	<div class="section">
		<div class="pull-left mr-15px">
			<button type="submit" class="btn btn-default"><i class="fa fa-edit"></i>
				<span>Update</span></button>
		</div>
		<div class="pull-left">
			<a href="{{ URL::to($post['slug']) }}" target="_blank" class="btn btn-default"><i class="fa fa-eye"></i>
				<span>View</span></a>
		</div>
		<div class="pull-right">
			<div class="pull-left selectpicker-md2 mr-5px">

				<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle btn-md--2nd" data-toggle="dropdown">
                        <span class="pull-left">
                            Select Category
                        </span>
                        <span class="pull-right">
                            <span class="caret"></span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu--extended" role="menu">
                    	@foreach($terms as $id => $term)
                        <li class="dd-menu--extended__item">
                            <label>
                            	{{ Form::checkbox('term_taxonomy_id[]', $id, (in_array($id, $post_terms) ? true : false ) ) }}  {{ $term }}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
			</div>
			<div class="pull-left selectpicker-md">
				{{ Form::select('post_status', array('publish' => 'Published', 'draft' => 'Draft'), $post['post_status'], array('class' => 'selectpicker') ) }}
			</div>
		</div>
	</div>
	<div class="section section--offset">
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<div class="mb-15px">
					{{ Form::text('post_title', $post['post_title'], array('class' => 'form-control form-control--2nd validate[required]', 'placeholder' => 'Policy Title' )) }}
				</div>
				<div class="panel">
					{{ Form::textarea('post_content',$post['post_content'], array('id' => 'CKEditorFull', 'class' => 'form-control form-pretty') ) }}
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="panel">
					<header class="panel__heading">
						<h3 class="h4">Media</h3>
					</header>
					<div class="panel__content">
						<span class="panel__sub">FEATURED MEDIA</span>
						<div class="img_panel_wrappr">
							<div class="panel__image">
								@if(isset($post['attachment']))
									<img src="{{ $post['post-thumbnail'] }}" alt="">
								@endif
							</div>
							@if(!isset($post['attachment']))
								<a href="#" class="set-post-thumbnail">
									Set featured media
								</a>
							@else
								<a href="#" class="panel__image-remove set-post-thumbnail">
									Remove feature media
								</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="panel">
					<header class="panel__heading">
						<h3 class="h4">Excerpt</h3>
					</header>
					<div class="panel__content">
						{{ Form::textarea('post_excerpt', $post['post_excerpt'], array(
						'class' => 'form-control form-pretty',
						'cols' => '30',
						'rows' => '3'
						)) }}
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel">
							<div class="panel__heading">
								<h3 class="h4">Search Engine</h3>
							</div>
							<div class="panel__content">
								<div class="row stroke-bottom block--spread">
									<div class="col-lg-12">
										<label for="">Page Title</label>
										<div class="form-group">
											{{ Form::text('meta[page_title]', (isset($post['page_title'])) ? $post['page_title'] : null, array('class' => 'form-control form-pretty')) }}
										</div>
									</div>
								</div>
								<div class="row stroke-bottom block--spread">
									<div class="col-lg-12">
										<label for="">URL Slug</label>
										<div class="form-group">
											<div class="form-control form-pretty form-offset">
												<div class="form-url">
													{{ URL::to('/') }}/
												</div>
												<div class="form-title">
													{{ Form::text( 'slug', $post['slug'], array('class' => 'form-control form-pretty')) }}
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row block--spread m-0px">
									<div class="col-lg-12">
										<label for="">Meta Description</label>
										<div class="form-group m-0px">
											{{ Form::textarea('meta[page_meta_description]',(isset($post['page_meta_description'])) ? $post['page_meta_description'] : null, array(
											'class' => 'form-control form-pretty',
											'cols' => '30',
											'rows' => '3'
											)) }}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{ Form::close() }}

<!-- Main Footer -->
<script>
	$(function(){
		cskMain.Comment.init();
	});
</script>

@stop