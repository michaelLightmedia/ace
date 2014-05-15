@extends('tax::tax-settings._sidebar')

@section('sub-content')

<form class="form-horizontal" method="post" action="@if (isset($tax_rate)){{ URL::to('/admin/tax-form/settings/tax-rates/' . $tax_rate->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <div class="panel">
        <div class="panel__heading">
            @if(!isset($tax_rate))
            <h1 class="h4">Add tax year</h1>
            @else
            <h1 class="h4">Edit tax year</h1>
            @endif
        </div>

        <div class="panel__sub_content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mt-15px mb-15px form-horizontal" role="form">

                        <?php list($error_msg, $error_class) = validator_res($errors,'taxable_income_from') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="taxable_income_from" class="col-lg-4 col-sm-4 control-label">
                                Taxable income from:
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <input id="taxable_income_from" class=" form-control " type="text" name="taxable_income_from" value="{{{ Input::old('taxable_income_from', isset($tax_rate) ? $tax_rate->taxable_income_from : null) }}}" />
                                {{ $error_msg }}
                            </div>
                            <p>Leave empty if less than taxable income to.</p>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'taxable_income_to') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="taxable_income_to" class="col-lg-4 col-sm-4 control-label">
                                Taxable income to:
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <input id="taxable_income_to" class=" form-control" type="text" name="taxable_income_to" value="{{{ Input::old('taxable_income_to', isset($tax_rate) ? $tax_rate->taxable_income_to : null) }}}" />
                                {{ $error_msg }}
                            </div>
                            <p>Leave empty if greater than taxable income from.</p>
                        </div>


                        <?php list($error_msg, $error_class) = validator_res($errors,'has_tax') ?>
                        <div class="form-group  {{ $error_class }}">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Has tax on this income ?
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <select id="has_tax" name="has_tax" class="form-control">
                                        <option <?php is_selected(isset($tax_rate) ? $tax_rate->has_tax : "",0); ?> value="0">No</option>
                                        <option <?php is_selected(isset($tax_rate) ? $tax_rate->has_tax : "",1); ?> value="1">Yes</option>
                                    </select>
                                    {{ $error_msg }}
                                </div>
                            </div>
                        </div>

                        <div id="has-tax-form"">
                            <?php list($error_msg, $error_class) = validator_res($errors,'start_at') ?>
                            <div class="form-group {{ $error_class }}">
                                <label for="start_at" class="col-lg-4 col-sm-4 control-label">
                                    Start at:
                                    <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="The default amount to be added"></i>
                                </label>
                                <div class="col-lg-8 col-md-7 col-sm-7">
                                    <input id="start_at" class="form-control" type="text" name="start_at" value="{{{ Input::old('start_at', isset($tax_rate) ? $tax_rate->start_at : 0.00) }}}" placeholder="0.00"/>
                                    {{ $error_msg }}
                                </div>
                            </div>

                            <?php list($error_msg, $error_class) = validator_res($errors,'cents_per_dollar') ?>
                            <div class="form-group {{ $error_class }}">
                                <label for="cents_per_dollar" class="col-lg-4 col-sm-4 control-label">
                                    Cents per dollar
                                    <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="The cents per 1 dollar"></i>
                                </label>
                                <div class="col-lg-8 col-md-7 col-sm-7">
                                    <div class="selectpicker-full">
                                        <input class="form-control" type="text" name="cents_per_dollar" id="cents_per_dollar" value="{{{ Input::old('cents_per_dollar', isset($tax_rate) ? $tax_rate->cents_per_dollar : 0.00) }}}" placeholder="0.00"/>
                                    </div>
                                    {{ $error_msg }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="pull-right col-lg-8 col-md-7 col-sm-7">
                                {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-info')) }}
                                <a href="{{ URL::to("/admin/tax-form/settings/tax-rates") }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop
