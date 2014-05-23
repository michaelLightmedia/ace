@extends('layouts.back')

@section('section-top')
	<div class="navbar-left">
		<h1 class="page-title">
			<span>Settings</span>
		</h1>
	</div>
@stop

@section('content')
	{{ Site::system_messages() }}

	<div class="content-body section section--box">
		<div class="content-body-sidebar">
			<div class="list-group list-group--2nd">
				<a href="{{ URL::to('admin/settings/general') }}" id="general" class="list-group-item active">
					<i class="fa fa-cog mr-5px"></i>
					Site Settings
				</a>
				<!--<a href="{{ URL::to('admin/settings/contact-info') }}" id="contact-info" class="list-group-item">
					<i class="fa fa-user mr-5px"></i>
					Contact Information
				</a>
				<a href="{{ URL::to('admin/settings/trackings') }}" id="trackings" class="list-group-item">
					<i class="fa fa-user mr-5px"></i>
					Trackings
				</a>
				<a href="{{ URL::to('admin/settings/user-security') }}" id="user-security" class="list-group-item">
					<i class="fa fa-user mr-5px"></i>
					User Security
				</a>-->
				<!--<a href="{{ URL::to('admin/settings/user') }}" id="user" class="list-group-item">
					<i class="fa fa-user mr-5px"></i>
					User Role
				</a>-->
			</div>
		</div>
        <div class="content-body-main">
		    @yield('sub-content')
        </div>
	</div>

	<script>
	  $('.list-group .list-group-item').removeClass('active');
	  @if(Request::segment(3) != '' )
	    $('#{{ Request::segment(3) }}').addClass('active');
	  @else
	    $('.list-group .list-group-item:eq(0)').addClass('active');
	  @endif
	</script>
@stop