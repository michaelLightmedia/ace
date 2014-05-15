@extends('user::user.template')

@section('sub-content')
<div class="panel__heading panel__heading--white">
    <h1 class="h4 text-blue t--huge">Friends</h1>
</div>
<div class="panel__content panel__content--offset">
    <div class="row">
        <div class="col-lg-12">
            <div class="section section--stroke">
                <div class="pull-left  mr-15px">
                    <a href="#" onclick="cskAdmin.BootrstrapAlert.xdelete('admin/member/delete/friends', 'Member');"  class="delete-membrs btn btn-default">
                      <i class="fa fa-trash-o"></i>
                      <span>Delete</span>
                    </a>
                </div>
                <div class="pull-left">
                    <div class="selectpicker-sm">
                      {{ $lists->records_per_page() }}
                    </div>
                </div>
            </div>
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
        tableHelper.init("{{ URL::to('admin/member/'.$user_id.'/edit/friends') }}");
        
        var el = $('.nav-tabs');
        $('li',el).removeClass('active');
        $('#friends', el).addClass('active');
    });
  </script>
@stop