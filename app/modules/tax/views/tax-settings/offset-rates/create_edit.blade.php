@extends('tax::tax-settings._sidebar')

@section('sub-content')

<form class="form-horizontal" method="post" action="@if (isset($offset_rate)){{ URL::to('/admin/tax-form/settings/offset-rates/' . $offset_rate->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <div class="panel">
        <div class="panel__heading">
            @if(!isset($offset_rate))
            <h1 class="h4">Add Rebate Eligibility </h1>
            @else
            <h1 class="h4">Edit Rebate Eligibility </h1>
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
                                <input id="taxable_income_from" class=" form-control " type="text" name="taxable_income_from" value="{{{ Input::old('taxable_income_from', isset($offset_rate) ? $offset_rate->taxable_income_from : null) }}}" />
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
                                <input id="taxable_income_to" class=" form-control" type="text" name="taxable_income_to" value="{{{ Input::old('taxable_income_to', isset($offset_rate) ? $offset_rate->taxable_income_to : null) }}}" />
                                {{ $error_msg }}
                            </div>
                            <p>Leave empty if greater than taxable income from.</p>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'has_tax') ?>
                        <div class="form-group  {{ $error_class }}">
                            <label for="status" class="col-lg-4 col-sm-4 control-label">
                                Status
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <select id="status" name="status" class="form-control">
                                        <option <?php is_selected(isset($offset_rate) ? $offset_rate->status : "","single"); ?> value="single">Single</option>
                                        <option <?php is_selected(isset($offset_rate) ? $offset_rate->status : "","family"); ?> value="family">Family</option>
                                    </select>
                                    {{ $error_msg }}
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading panel-heading-sub">
                            <h2 class="panel-title pull-left">Base Levels Rate</h2>
                            <a id="add_base_level" href="#" class="btn btn-default pull-right"><span class="fa fa-plus"></span> Add</a>
                        </div>


                        <div id="base_levels" class=" inline-form">
                            @if (!isset($offset_rate) || count($offset_rate->offsetRateBaseLevels) <= 0)
                                <?php $index=0; ?>
                                @include('tax::tax-settings.offset-rates._base_level_rate')
                            @else

                            <?php $index=0; ?>
                                @foreach($offset_rate->offsetRateBaseLevels as $base_level)
                                    @include('tax::tax-settings.offset-rates._base_level_rate')
                                <?php $index++; ?>
                                @endforeach

                            @endif
                        </div>
                        
                        <div class="pull-right col-lg-8 col-md-7 col-sm-7">
                            <div class="form-group form-group-footer">                            
                                {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-info')) }}
                                <a href="{{ URL::to("/admin/tax-form/settings/offset-rates") }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop

@section('footer')
    @parent

    <script>
        $(function(){
            cskAdmin.offsetRatePage.init();
        });
    </script>
@stop
