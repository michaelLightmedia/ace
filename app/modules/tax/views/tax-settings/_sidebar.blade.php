@extends('layouts.back')

@section('content')
	{{ Gy::system_messages() }}

    <!-- Main Content -->
    <div class="section section--top">
        <div class="pull-left">
            <h1 class="h3 section__title">
                <i class="fa fa-cog fa-spin mr-5px"></i>
                <span>Tax Settings</span>
            </h1>
        </div>
    </div>

	<div class="section">
		<div class="content-body">
			<div class="content-body-sidebar">
				<div class="list-group list-group--2nd">
					<a href="{{ URL::to('admin/tax-form/settings/payment') }}" id="payment" class="list-group-item">
						<i class="fa fa-user mr-5px"></i>
                            Payment
					</a>
<!--					<a href="{{ URL::to('admin/tax-form/settings/tax-years') }}" id="tax-years" class="list-group-item">-->
<!--						<i class="fa fa-user mr-5px"></i>-->
<!--						Tax Year-->
<!--					</a>-->
                    <a href="{{ URL::to('admin/tax-form/settings/tax-rates') }}" id="tax-rates" class="list-group-item">
                        <i class="fa fa-cog mr-5px"></i>
                        Tax Rates
                    </a>
					<a href="{{ URL::to('admin/tax-form/settings/tax-mls') }}" id="tax-mls" class="list-group-item">
						<i class="fa fa-clock-o mr-5px"></i>
                        Medicare Levy Surcharge(MLS)
					</a>
					<a href="{{ URL::to('admin/tax-form/settings/help-rates') }}" id="tax-mls" class="list-group-item">
						<i class="fa fa-clock-o mr-5px"></i>
                        Help/Debt Rates
					</a>
					<a href="{{ URL::to('admin/tax-form/settings/offset-rates') }}" id="tax-mls" class="list-group-item">
                        <i class="fa fa-user mr-5px"></i>
                        Rebate Eligibility
					</a>
					<a href="{{ URL::to('admin/tax-form/settings/cents-per-kilometre') }}" id="tax-mls" class="list-group-item">
                        <i class="fa fa-user mr-5px"></i>
                        Cents Per Kilometre
					</a>
				</div>
			</div>
            <div class="content-body-main">
			    @yield('sub-content')
            </div>
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

@section('footer')
    @parent()
    <script>
        $(function(){
            cskAdmin.taxSettingsPage.init();
            cskAdmin.taxRatePage.init();
        });
    </script>
@stop