@extends('settings::_sidebar')
@section('sub-content')
{{ Form::open(array('method'=>'post','url' => 'admin/settings/general', 'files' => true,'autocomplete'=>'off')) }}

<input type="hidden" name="success_url" value="{{ url('admin/settings/user-security') }}">
<div class="panel">
    <div class="panel__heading">
        <h1 class="h4">Goolge Analytics</h1>
    </div>
    <div class="panel__sub_content">
        <div class="row">
            <div class="col-lg-7">

                <div class="mt-15px mb-15px form-horizontal" role="form">
                    <div class="form-group">
                        <label for="option[maximum_login_attempt]" class="col-lg-4 col-sm-4 control-label">
                            Maximum Login Attempt(s)
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="The maximum attemp that the user will be locked out" data-original-title="The maximum attemp that the user will be locked out"></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::text('option[maximum_login_attempt]', Settings::get('maximum_login_attempt'), array('class' => 'form-control ', 'autofocus' => 'autofocus')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option[user_locked_hours]" class="col-lg-4 col-sm-4 control-label">
                            Locked Hours
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="The number of hours that the user will remain locked." data-original-title="The number of hours that the user will remain locked."></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::text('option[user_locked_hours]', Settings::get('user_locked_hours'), array('class' => 'form-control validate[required]', 'autofocus' => 'autofocus')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option[on_user_lock_message]" class="col-lg-4 col-sm-4 control-label">
                            Lock Message
                            <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Message that will show to the user when there account is temporary locked out." data-original-title="Message that will show to the user when there account is temporary locked out."></i>
                        </label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            {{ Form::textarea('option[on_user_lock_message]', Settings::get('on_user_lock_message'), array('class' => 'form-control validate[required]', 'rows' => '3', 'autofocus' => 'autofocus')) }}
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