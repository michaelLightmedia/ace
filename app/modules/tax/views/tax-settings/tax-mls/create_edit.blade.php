@extends('tax::tax-settings._sidebar')

@section('sub-content')

<form class="form-horizontal" method="post" action="@if (isset($tax_mls)){{ URL::to('/admin/tax-form/settings/tax-mls/' . $tax_mls->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <div class="panel">
        <div class="panel__heading">
            @if(!isset($tax_mls))
            <h1 class="h4">Add Medicare Levy Surcharge(MLS)</h1>
            @else
            <h1 class="h4">Edit Medicare Levy Surcharge(MLS)</h1>
            @endif
        </div>
        <div class="panel__sub_content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mt-15px mb-15px form-horizontal" role="form">


                        <?php list($error_msg, $error_class) = validator_res($errors,'status') ?>
                        <div class="form-group">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Status
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <select class="selectpicker" id="select-gateway" name="status">
                                        <option <?php is_selected(isset($tax_mls) ? $tax_mls->status : "","single"); ?> value="single">
                                            Single
                                        </option>
                                        <option <?php is_selected(isset($tax_mls) ? $tax_mls->status : "","family"); ?> value="family">
                                            Family
                                        </option>
                                    </select>
                                    {{ $error_msg }}
                                </div>
                            </div>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'taxable_income_from') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Taxable income from
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <input class="form-control" type="text" name="taxable_income_from" id="taxable_income_from" value="{{{ Input::old('taxable_income_from', isset($tax_mls) ? $tax_mls->taxable_income_from : null) }}}" />
                                </div>
                                {{ $error_msg }}
                                <p>Leave empty if less than taxable income to.</p>
                            </div>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'taxable_income_to') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="taxable_income_to" class="col-lg-4 col-sm-4 control-label">
                                Taxable income to
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <input class="form-control" type="text" name="taxable_income_to" id="taxable_income_to" value="{{{ Input::old('taxable_income_to', isset($tax_mls) ? $tax_mls->taxable_income_to : null) }}}" />
                                </div>
                                {{ $error_msg }}
                                <p>Leave empty if greater than taxable income from.</p>
                            </div>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'mls_rate') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="mls_rate" class="col-lg-4 col-sm-4 control-label">
                                Rate
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="The date that the tax year starts."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <input class=" form-control " id="mls_rate" type="text" name="mls_rate" value="{{{ Input::old('mls_rate', isset($tax_mls) ? $tax_mls->mls_rate : null) }}}" />

                                {{ $error_msg }}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="pull-right col-lg-8 col-md-7 col-sm-7">
                                {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-info')) }}
                                <a href="{{ URL::to("/admin/tax-form/settings/tax-mls") }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    @stop