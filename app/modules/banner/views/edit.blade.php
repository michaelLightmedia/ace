@extends('layouts.back')

@section('section-top')

<div class="navbar-left">
	<h1 class="page-title">
		<span>Banner</span>
	</h1>
</div>

@stop
@section('content')
	<div class="section section--top">	
		<div class="section-left">
			<ul class="action-list">
				<li>
					<a href="{{ URL::to('admin/page/create') }}" class="btn btn-success">
				        <i class="fa fa-plus mr-5px"></i>
				        <span>Add New</span>
				    </a>
				</li>
			</ul>
		</div>
	</div>
	{{ Site::system_messages() }}
	
	{{ Form::open(array('url' => 'admin/banner/'.$post['id'].'/edit', 'id' => 'post-form' )) }}
	{{ Form::hidden('post_type', 'banner') }}
	{{ Form::hidden('id', $post['id'], array('id' => 'post_id')) }}
	{{ Form::hidden('comment_status', 'open') }}
	{{ Form::hidden('post_parent', '0') }}
	{{ Form::hidden('post_date', date('Y-m-d H:i:s')) }}
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
				{{ Form::select('post_status', array('publish' => 'Published', 'draft' => 'Draft'), $post['post_status'], array('class' => 'selectpicker')) }}
			</div>
		</div>
	</div>
	<div class="section section--offset">
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<div class="mb-15px">
					{{ Form::text('post_title', $post['post_title'], array('class' => 'form-control form-control--2nd validate[required]', 'placeholder' => 'banner Name' )) }}
				</div>
			</div>
			<div class="col-lg-9 col-md-8">
					<div class="panel">
						<div class="panel__content">
							<div class="row block--spread m-0px">
								<div class="col-lg-12">
									{{ Form::label('post_content', 'Content') }}
									<div class="form-group m-0px">
										{{ Form::textarea('post_content', $post['post_content'], array(
										'class' => 'form-control form-pretty',
										'cols' => '30',
										'rows' => '3'
										)) }}	
									</div>
								</div>
								<div class="col-lg-12">
									{{ Form::label('post_excerpt', 'Excerpt') }}
									<div class="form-group m-0px">
										{{ Form::textarea('post_excerpt', $post['post_excerpt'], array(
										'class' => 'form-control form-pretty',
										'cols' => '30',
										'rows' => '3'
										)) }}	
									</div>
								</div>
								<div class="col-lg-12">
									{{ Form::checkbox('meta[banner_target]', 1, isset($post['banner_target']) && $post['banner_target'] == 1 ? 'checked' :null) }} 
									{{ Form::label('banner_target', 'Open new window?') }}
								</div>
								<div class="col-lg-12">
									{{ Form::label('banner_url', 'Url') }}
									<div class="form-group m-0px">
										{{ Form::text('meta[banner_url]', isset($post['banner_url']) ? $post['banner_url'] :null , array(
										'class' => 'form-control form-pretty'
										)) }}	
									</div>
								</div>
								<div class="col-lg-12">
									{{ Form::label('button_text', 'Button Text') }}
									<div class="form-group m-0px">
										{{ Form::text('meta[button_text]', isset($post['button_text']) ? $post['button_text'] :null , array(
										'class' => 'form-control form-pretty'
										)) }}	
									</div>
								</div>
								<div class="col-lg-12">
									{{ Form::label('menu_order', 'Ordering') }}
									<div class="form-group m-0px">
										{{ Form::select('menu_order', Site::getPostforOrder('banner'), $post['menu_order'] - 1, array(
										'class' => 'form-control form-pretty'
										)) }}	
									</div>
								</div>
								
							</div>
						</div>
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

	</div>
	{{ Form::close() }}
@stop