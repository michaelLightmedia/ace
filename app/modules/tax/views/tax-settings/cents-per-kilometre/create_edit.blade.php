@extends('tax::tax-settings._sidebar')

@section('sub-content')

<form class="form-horizontal" method="post" action="@if (isset($cents_per_kilometre)){{ URL::to('/admin/tax-form/settings/cents-per-kilometre/' . $cents_per_kilometre->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->
    <div class="panel">
        <div class="panel__heading">
            @if(!isset($cents_per_kilometre))
            <h1 class="h4">Add Cents Per Kilometre</h1>
            @else
            <h1 class="h4">Edit Cents Per Kilometre</h1>
            @endif
        </div>

        <div class="panel__sub_content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mt-15px mb-15px form-horizontal" role="form">

                        <?php list($error_msg, $error_class) = validator_res($errors,'engine_capacity') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="engine_capacity" class="col-lg-4 col-sm-4 control-label">
                                Engine Capacity:
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <input id="engine_capacity" class=" form-control " type="text" name="engine_capacity" value="{{{ Input::old('engine_capacity', isset($cents_per_kilometre) ? $cents_per_kilometre->engine_capacity : null) }}}" />
                                {{ $error_msg }}
                            </div>
                        </div>

                        <?php list($error_msg, $error_class) = validator_res($errors,'cents_per_kilometre') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="cents_per_kilometre" class="col-lg-4 col-sm-4 control-label">
                                Taxable income from:
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <input id="cents_per_kilometre" class=" form-control " type="text" name="cents_per_kilometre" value="{{{ Input::old('cents_per_kilometre', isset($cents_per_kilometre) ? $cents_per_kilometre->cents_per_kilometre : null) }}}" />
                                {{ $error_msg }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="pull-right col-lg-8 col-md-7 col-sm-7">
                                {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-info')) }}
                                <a href="{{ URL::to("/admin/tax-form/settings/cents-per-kilometre") }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@stop
