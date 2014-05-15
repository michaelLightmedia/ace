@extends('layouts.back')

@section('section-top')
  <div class="section section--top">
    <div class="pull-left mr-15px">
      <h1 class="h3 section__title">
        <i class="fa fa-copy mr-5px"></i>
        <span>Modules</span>
      </h1>
    </div>
    <div class="pull-left">
      <a href="{{ URL::to('admin/banner/create') }}" class="btn btn-blue btn-uc btn-sm-2nd mt-5px">
        <i class="fa fa-plus mr-5px"></i>
        <span>Add New</span>
      </a>
    </div>
    {{ $lists->search_box() }}
  </div>
@stop
@section('content')
<!-- Main Content -->
  <div class="t-content">
	{{ Site::system_messages() }}
    <div class="section section--stroke">
     <div class="pull-left">
        <a onclick="cskAdmin.BootrstrapAlert.xdelete('admin/banner/delete', 'Group buy');return false;" class="delete-post btn btn-default">
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
      tableHelper.init("{{ URL::to('admin/banners') }}");
    })
  </script>
@stop