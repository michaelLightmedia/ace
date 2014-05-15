@extends('layouts.back')

@section('section-top')
  <div class="navbar-left">
    <h1 class="page-title">
      <span>Comments</span>
    </h1>
    {{ $lists->search_box() }}
  </div>
@stop
@section('content')
<!-- Main Content -->
	{{ Site::system_messages() }}
    <div class="section section--top">
      <div class="section-left">
        <ul class="action-list">
          <li>
            <a onclick="cskAdmin.BootrstrapAlert.xdelete('admin/comment/delete', 'Group buy');return false;" class="delete-post btn btn-default">
              <i class="fa fa-trash-o"></i>
              <span>Delete</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="section-right">
        <div class="selectpicker-sm">
          {{ $lists->records_per_page() }}
        </div>
      </div>
    </div>
    <div class="section mt-58px section--box">
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

  <script>
    $(function(){
      tableHelper.init("{{ URL::to('admin/comments') }}");
    })
  </script>
@stop