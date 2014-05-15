@extends('layouts.back')

@section('section-top')
  <div class="section section--top">
    <div class="pull-left mr-15px">
      <h1 class="h3 section__title">
        <i class="fa fa-picture-o mr-5px"></i>
        <span>Media</span>
      </h1>
    </div>
    <div class="pull-left">
      <a href="{{ URL::to('admin/media/create') }}" class="btn btn-blue btn-uc btn-sm-2nd mt-5px">
        <i class="fa fa-picture-o mr-5px"></i>
        <span>Add New</span>
      </a>
    </div>
    {{ $lists->search_box() }}
  </div>
@stop
@section('content')
<!-- Main Content -->
  <div class="t-content">
    <div class="section section--stroke">
     <div class="pull-left">
        <a onclick="cskAdmin.BootrstrapAlert.xdelete('admin/media/delete', 'File');return false;" class="delete-media btn btn-default">
          <i class="fa fa-trash-o"></i>
          <span>Delete</span>
        </a>
      </div>
      <div class="pull-right">
        <div class="selectpicker-sm">
          {{ $lists->records_per_page() }}
        </div>
      </div>
    </div>
    <div class="section section--box">
      <div class="row">
        {{ Site::system_messages() }}
      	{{ Form::open(array('url' => 'admin/dashboard', 'method' => 'GET')) }}
        <div class="section section--offset">
            {{ $lists->prepare_items() }}
            {{ $lists->display() }}
          
          <div class="pull-left">
            <div class="table-results">
              {{ $lists->pagination_info() }}
            </div>
          </div>
          <div class="pull-right">    
            {{ $lists->pagination() }}
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>

  <script>
    $(function(){
      tableHelper.init("{{ URL::to('admin/media') }}");
    })
  </script>
@stop