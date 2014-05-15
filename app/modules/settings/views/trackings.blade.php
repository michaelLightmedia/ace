@extends('settings::_sidebar')
@section('sub-content')
{{ Form::open(array('url' => 'admin/settings/general', 'files' => true)) }}

<input type="hidden" name="success_url" value="{{ url('admin/settings/trackings') }}">
<div class="panel">
    <div class="panel__heading">
        <h1 class="h4">Goolge Analytics</h1>
    </div>
    <div class="panel__sub_content">
        <div class="row">
            <div class="col-lg-7">

                <div class="mt-15px mb-15px form-horizontal" role="form">
                    <div class="form-group">
                        <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                            Google Analytics ID
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Your google analytic id" data-original-title="This address is used for admin purposes, like new user notification."></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::text('option[analytic_id]', Settings::get('analytic_id'), array('class' => 'form-control ', 'autofocus' => 'autofocus')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                            Account
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Google analytic Account" data-original-title="Default page title if no seo page title was setted"></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::text('option[analytic_account]', Settings::get('analytic_account'), array('class' => 'form-control validate[required]', 'autofocus' => 'autofocus')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                            Password
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Google analytic Password" data-original-title="Default page meta description"></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::textarea('option[analytic_password]', Settings::get('analytic_password'), array('class' => 'form-control validate[required]', 'rows' => '3', 'autofocus' => 'autofocus')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                            Profile ID
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Google Analytic Profile ID" data-original-title="Default page meta description"></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::textarea('option[analytic_password]', Settings::get('analytic_password'), array('class' => 'form-control validate[required]', 'rows' => '3', 'autofocus' => 'autofocus')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admin_email" class="col-lg-4 col-sm-4 control-label">&nbsp;</label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                                {{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-lg btn-success')) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

{{ Form::close() }}
@stop