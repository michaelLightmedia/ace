@extends('settings::_sidebar')
@section('sub-content')
{{ Form::open(array('url' => 'admin/settings/general', 'files' => true)) }}

<input type="hidden" name="success_url" value="{{ url('admin/settings/contact-info') }}">

<div class="panel">
    <div class="panel__heading">
        <h1 class="h4">Google Map</h1>
    </div>
    <div class="panel__sub_content">
        <div class="row">
            <div class="col-lg-7">

                <div class="mt-15px mb-15px form-horizontal" role="form">
                    <div class="form-group">
                        <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                            Google Map
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Your google analytic id" data-original-title="This address is used for admin purposes, like new user notification."></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::textarea('option[google_map]', htmlspecialchars_decode(get_settings('google_map')), array('class' => 'form-control ', 'autofocus' => 'off')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="pull-right col-lg-8 col-md-7 col-sm-7">
                            {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-lg btn-success')) }}
                            <a href="{{ URL::to("/admin/tax-form/settings/cents-per-kilometre") }}" class="btn btn-lg btn-default">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

</div>

{{ Form::close() }}
@stop