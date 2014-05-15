@extends('tax::tax-settings._sidebar')

@section('sub-content')

<form class="form-horizontal" method="post" action="@if (isset($tax_year)){{ URL::to('/admin/tax-form/settings/tax-years/' . $tax_year->year . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <?php


    ?>
    <div class="panel">
        <div class="panel__heading">
            @if(!isset($tax_year))
            <h1 class="h4">Add tax year</h1>
            @else
            <h1 class="h4">Edit tax year</h1>
            @endif
        </div>
        <div class="panel__sub_content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mt-15px mb-15px form-horizontal" role="form">

                        <?php list($error_msg, $error_class) = validator_res($errors,'year') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Tax Year
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <input class="form-control" type="text" name="year" id="year" value="{{{ Input::old('year', isset($tax_year) ? $tax_year->year : null) }}}" />
                                </div>
                                {{ $error_msg }}
                            </div>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'year_from') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="datepicker-from" class="col-lg-4 col-sm-4 control-label">
                                Tax date start (optional)
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="The date that the tax year starts."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="datetimepicker-wrap">
                                    <input id="datepicker-from" class=" form-control datetimepicker" type="text" name="year_from" value="{{{ Input::old('year_from', isset($tax_year) ? db2dpicker($tax_year->year_from) : null) }}}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar fa fa-calendar"></span>
                                    </span>
                                </div>
                                {{ $error_msg }}
                            </div>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'year_start_to') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="datepicker-to" class="col-lg-4 col-sm-4 control-label">
                                Tax date to (optional)
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="The date that the tax ends."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="datetimepicker-wrap">
                                    <input id="datepicker-to" class="form-control" type="text" name="year_to" value="{{{ Input::old('year_to', isset($tax_year) ? db2dpicker($tax_year->year_to) : null) }}}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar fa fa-calendar"></span>
                                    </span>
                                    {{ $error_msg }}
                                </div>
                            </div>
                        </div>


                        <?php list($error_msg, $error_class) = validator_res($errors,'is_active') ?>
                        <div class="form-group">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Status
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <select class="selectpicker" id="select-gateway" name="is_active">
                                        <option <?php is_selected(isset($tax_year) ? $tax_year->is_active : "",1); ?>  selected="selected" value="1">
                                            Active
                                        </option>
                                        <option <?php is_selected(isset($tax_year) ? $tax_year->is_active : "",0); ?> value="0">
                                            Inactive
                                        </option>
                                    </select>
                                    {{ $error_msg }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-footer">
                            <div class="pull-right col-lg-8 col-md-7 col-sm-7">
                                {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-info')) }}
                                <a href="{{ URL::to("/admin/tax-form/settings/tax-years") }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    @stop