@extends('layouts.tax_form')

@section('content')

<div class="page-heading">
    <div class="container-fluid container-l2">
        <h1>Dashboard</h1>
    </div>
</div>

<div class="container-fluid container-l2">

    @include('taxform::dashboard._sidebar')

    <div class="t-content">
        <div class="section mt-60px">
            <div class="form form-l2">

                <form id="details_form" class="are_you_sure" method="POST" action="{{ url('/dashboard') }}" autocomplete="off" novalidate="novalidate">

                    {{ Gy::system_messages() }}

                    <div id="details_form_message"></div>

                    <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                    <input type="hidden" name="next_process_url" value="{{ url('/tax-form/' . Session::get('user_tax_year_id') . '/income') }}">
                    <input type="hidden" name="success_url" value="{{ url('/dashboard/' . $tax_year->year) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <ul class="list-inline nav nav-tabs">
                        <li class="active">
                            <a href="#details" data-content-location="{{ URL::to("/tax-form/{$tax_year->year}/personal-details") }}" class="tab" data-toggle="tab"><i class="fa fa-user"></i> Personal Details</a>
                        </li>
                        <li>
                            <a href="#address" data-content-location="{{ URL::to("/tax-form/{$tax_year->year}/address") }}" class="tab" data-toggle="tab"><i class="fa fa-user"></i> Address</a>
                        </li>
                        <li>
                            <a href="#family-status" data-content-location="{{ URL::to("/tax-form/{$tax_year->year}/family-status") }}" class="tab" data-toggle="tab"><i class="fa fa-users"></i> Family Status</a>
                        </li>
                        <li>
                            <a href="#medicare" data-content-location="{{ URL::to("/tax-form/{$tax_year->year}/medicare") }}" class="tab" data-toggle="tab"><i class="fa fa-users"></i> Medicare</a>
                        </li>
                    </ul>
                    <div class="form form-l2">
                        <div class="tab-content">
                            <div class="tab-pane active loading" id="details">
                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Personal Details</h3>
                                    </div>

                                    @include('taxform::dashboard._details')
                                </div>
                            </div>

                            <div class="tab-pane" id="address">
                                <div class="section section-l8" >
                                    <div class="section-heading">
                                        <h3>Enter your current Postal Address</h3>
                                    </div>
                                    {{-- Address Tab here --}}
                                    @include('taxform::dashboard._address')
                                </div>
                            </div>

                            <div class="tab-pane" id="family-status">
                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Family Status</h3>
                                    </div>
                                    {{-- Family Status --}}
                                    @include('taxform::dashboard._family_status')

                                </div>
                            </div>

                            <div class="tab-pane" id="medicare">

                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Medicare </h3>
                                    </div>
                                    {{-- Family Status --}}
                                    @include('taxform::dashboard._medicare')
                                </div>
                            </div>
                        </div> <!-- /.tab-content  -->


                        <div class="form-group-actions">
                            <button type="submit" name="submit_action" value="save" class="btn_action btn btn-lg btn-primary">
                                <i class="fa fa-spinner fa-spin"></i><i class="fa fa-ok"></i>SAVE
                            </button>
                            <button type="submit" name="submit_action" value="save_continue" class="btn_action btn btn-lg btn-primary">
                                <i class="fa fa-spinner fa-spin"></i>
                                <i class="fa fa-ok"></i>
                                Save and go to Tax Form
                            </button>
                            <a href="{{ url("/tax-form/cancel-info?tax_year=" . Session::get('user_tax_year_id')) }}" class="btn btn-lg btn-green">Cancel<span class=""></span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $.taxform.dashboard.init();
    });
</script>
@stop
