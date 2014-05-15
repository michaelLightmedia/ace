@extends('layouts.back')

@section('section-top')
  <div class="section section--top">
    <div class="pull-left mr-15px">
      <h1 class="h3 section__title">
        <i class="fa fa-group mr-5px"></i>
        <span>Members</span>
      </h1>
    </div>
    <div class="pull-left  mr-15px">
      <a href="{{ URL::to('admin/member/0/edit/membership') }}" class="btn btn-blue btn-uc btn-sm-2nd mt-5px">
        <i class="fa fa-plus mr-5px"></i>
        <span>Add New</span>
      </a>
    </div>
    <div class="pull-left  mr-15px">
      {{ Form::open(array( 'url' => 'admin/members/import', 'files' => true )) }}
      <span class="btn btn-success btn-uc btn-sm-2nd mt-5px fileinput-button">
        <span><i class="fa fa-plus mr-5px"></i><input type="file" name="csv">Browse</span>
      </span>
      <button type="submit" class="btn btn-warning btn-uc btn-sm-2nd mt-5px" >Go</button>
      {{ Form::close() }}
    </div>
    {{ $lists->search_box() }}
  </div>
@stop
@section('content')
<!-- Main Content -->
	{{ Site::system_messages() }}
    <div class="section section--stroke">
     <div class="pull-left  mr-15px">
        <a href="#" onclick="cskAdmin.BootrstrapAlert.xdelete('admin/member/delete', 'Member');"  class="delete-membrs btn btn-default">
          <i class="fa fa-trash-o"></i>
          <span>Delete</span>
        </a>
      </div>
      <div class="pull-left">
        <div class="selectpicker-m">
          <select onchange="cskAdmin.BootrstrapAlert.xActivate(this, 'admin/member/activate', 'Member');"  class="selectpicker" id="status" name="status">
            <option value="-1">Bulk Action</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
        </div>
      </div>
      
      

      <div class="pull-right">
        <div class="selectpicker-sm">
          {{ $lists->records_per_page() }}
        </div>
      </div>
    </div>
    <div class="section section--box">
      <div class="row">
      	{{ Form::open(array('url' => 'admin/members', 'method' => 'GET')) }}
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
      tableHelper.init("{{ URL::to('admin/members') }}");
    })
  </script>
@stop