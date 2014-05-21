@extends('layouts.back')

@section('section-top')
  <div class="navbar-left">
      <h1 class="page-title">
        <span>Page</span>
      </h1>
      {{ $lists->search_box() }}
  </div>
  
@stop
@section('content')

<div class="section section--top">
    <div class="section-left">
      <ul class="action-list">
        <li>
          <a href="{{ URL::to('admin/page/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            <span>Add New</span>
          </a>
        </li>
        <li>
          <a onclick="cskAdmin.BootrstrapAlert.xdelete('admin/page/delete', 'Group buy');return false;" class="delete-post btn btn-default">
            <i class="fa fa-trash-o"></i>
            <span>Delete</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="section-right">
      <ul class="action-list">
        <li>
          <div class="selectpicker-sm">
            {{ $lists->records_per_page() }}
          </div>
        </li>
      </ul>
    </div>
</div>

<!-- Main Content -->
	{{ Site::system_messages() }}
  {{ $lists->prepare_items() }}
    <div class="section section--box">
      <div class="row">
      	{{ Form::open(array('url' => 'admin/dashboard', 'method' => 'GET')) }}
        <div class="section section--offset">

          <div class="table-actions">
            <div class="table-action-left">
              <div class="table-results">
                {{ $lists->pagination_info() }}
              </div>
            </div>
          </div>

          
          {{ $lists->display() }}
        
         <div class="table-actions">
            <div class="table-action-left">
              <div class="table-results">
                {{ $lists->pagination_info() }}
              </div>
            </div>
            <div class="table-action-right">
              {{ $lists->pagination() }}
            </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>

  <script>
    $(function(){
      tableHelper.init("{{ URL::to('admin/pages') }}");
    })
  </script>
@stop