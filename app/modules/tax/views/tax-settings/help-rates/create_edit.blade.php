@extends('tax::tax-settings._sidebar')

@section('sub-content')

<form class="form-horizontal" method="post" action="@if (isset($help_rate)){{ URL::to('/admin/tax-form/settings/help-rates/' . $help_rate->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <div class="panel">
        <div class="panel__heading">
            @if(!isset($help_rate))
            <h1 class="h4">Add Help Repayment Rate</h1>
            @else
            <h1 class="h4">Edit Help Repayment Rate</h1>
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
                                
                                <input id="taxable_income_from" class=" form-control " type="text" name="taxable_income_from" value="{{{ Input::old('taxable_income_from', isset($help_rate) ? $help_rate->taxable_income_from : null) }}}" />
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
                                <input id="taxable_income_to" class=" form-control" type="text" name="taxable_income_to" value="{{{ Input::old('taxable_income_to', isset($help_rate) ? $help_rate->taxable_income_to : null) }}}" />
                                {{ $error_msg }}
                            </div>
                            <p>Leave empty if greater than taxable income from.</p>
                        </div>



                        <?php list($error_msg, $error_class) = validator_res($errors,'repayment_rate') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="repayment_rate" class="col-lg-4 col-sm-4 control-label">
                                Repayment Rate
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <input class="form-control" type="text" name="repayment_rate" id="repayment_rate" value="{{{ Input::old('repayment_rate', isset($help_rate) ? $help_rate->repayment_rate : 0.00) }}}" placeholder="0.00"/>
                                </div>
                                {{ $error_msg }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="pull-right col-lg-8 col-md-7 col-sm-7">
                                {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-info')) }}
                                <a href="{{ URL::to("/admin/tax-form/settings/help-rates") }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop
