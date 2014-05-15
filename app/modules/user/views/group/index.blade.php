@extends('layouts.back')

@section('section-top')
  <div class="section section--top">
    <div class="pull-left mr-15px">
      <h1 class="h3 section__title">
        <i class="fa fa-group mr-5px"></i>
        <span>Groups</span>
      </h1>
    </div>
    <div class="pull-left">
      <a href="{{ URL::to('admin/members/group/create') }}" class="btn btn-blue btn-uc btn-sm-2nd mt-5px">
        <i class="fa fa-plus mr-5px"></i>
        <span>Add New</span>
      </a>
    </div>
    {{ $lists->search_box() }}
  </div>
@stop
@section('content')
<!-- Main Content -->
	{{ Site::system_messages() }}
    <div class="section section--stroke">
     <!--<div class="pull-left  mr-15px">
        <a href="#" onclick="cskAdmin.BootrstrapAlert.xdelete('admin/members/group/delete', 'Group');"  class="delete-membrs btn btn-default">
          <i class="fa fa-trash-o"></i>
          <span>Delete</span>
        </a>
      </div>-->

      <div class="pull-right">
        <div class="selectpicker-sm">
          {{ $lists->records_per_page() }}
        </div>
      </div>
    </div>
    <div class="section section--box">
      <div class="row">
      	{{ Form::open(array('url' => 'admin/members/groups', 'method' => 'GET')) }}
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
      tableHelper.init("{{ URL::to('admin/members/groups') }}");
    })
  </script>
@stop