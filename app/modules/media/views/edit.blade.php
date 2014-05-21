@extends('layouts.back')

@section('section-top')

<div class="navbar-left">
    <h1 class="page-title">
        <span>Page</span>
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
    
    {{ Form::open(array('url' => 'admin/media/'.$post['id'].'/edit', 'id' => 'post-form' )) }}
    {{ Form::hidden('post_type', 'media') }}
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
            <a href="{{ URL::to('/?attachment_id='.$post['id']) }}" target="_blank" class="btn btn-default"><i class="fa fa-eye"></i>
                <span>View</span></a>
        </div>
    </div>
    <div class="section section--offset">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="mb-15px">
                    {{ Form::text('post_title', $post['post_title'], array('class' => 'form-control form-control--2nd validate[required]', 'placeholder' => 'Title' )) }}
                </div>
                <div class="mb-15px">
                    {{ Form::label('file_url', 'File URL') }}
                    {{ Form::text('file_url', $post['guid'], array('class' => 'form-control form-control--2nd', 'placeholder' => 'File Url' )) }}
                </div>
                <div class="panel">
                    {{ Form::textarea('post_content',$post['post_content'], array('id' => 'CKEditorFull' , 'class' => '')) }}
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <header class="panel__heading">
                                <h3 class="h4">Media</h3>
                            </header>
                            <div class="panel__content">
                                <div class="panel__image">
                                    <img style="max-width:100%" src="{{ $post['post-thumbnail'] }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel__heading">
                                <h3 class="h4">Description</h3>
                            </div>
                            <div class="panel__content">
                                <div class="row stroke-bottom block--spread">
                                    <div class="col-lg-12">
                                        {{ Form::label('post_excerpt', 'Caption') }}
                                        <div class="form-group">
                                            {{ Form::text('post_excerpt', $post['post_excerpt'], 
                                            array('class' => 'form-control form-pretty')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row stroke-bottom block--spread">
                                    <div class="col-lg-12">
                                        {{ Form::label('meta[attachment_image_alt]', 'Alternative Text') }}
                                        <div class="form-group">
                                            {{ Form::text('meta[attachment_image_alt]', (isset($post['attachment_image_alt'])) ? $post['attachment_image_alt'] : null, array(
                                            'class' => 'form-control form-pretty',
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
@stop
