@extends('settings::_sidebar')
@section('sub-content')
{{ Form::open(array('url' => 'admin/settings/general', 'files' => true)) }}	

    <div class="panel">
        <div class="panel__heading">
            <h1 class="h4">Site Settings</h1>
        </div>
        <div class="panel__sub_content">
            <div class="row">
                <div class="col-lg-7">

                    <div class="mt-15px mb-15px form-horizontal" role="form">
                        <div class="form-group">
                            <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                                E-mail Address
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="This address is used for admin purposes, like new user notification."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                {{ Form::text('option[admin_email]', Settings::get('admin_email'), array('class' => 'form-control validate[required, custom[email]]', 'autofocus' => 'autofocus')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                                Site Title
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Default page title if no seo page title was setted" data-original-title="Default page title if no seo page title was setted"></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                {{ Form::text('option[site_page_title]', Settings::get('site_page_title'), array('class' => 'form-control validate[required]', 'autofocus' => 'autofocus')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                                Site Tagline
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Default page meta description" data-original-title="Default page meta description"></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                {{ Form::textarea('option[site_meta_desc]', Settings::get('site_meta_desc'), array('class' => 'form-control validate[required]', 'rows' => '3', 'autofocus' => 'autofocus')) }}
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Timezone
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Select your timezone" data-original-title="Select your timezone"></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full selectpicker-format">
                                    {{ Form::select('option[timezone_string]', $timezones, Settings::get('timezone_string'), array('class' => 'selectpicker')) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option[date_format]" class="col-lg-4 col-sm-4 control-label">
                                Date Format
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full selectpicker-format">
                                    <fieldset>
                                        @foreach($dateFormats as $format => $value)
                                            <label title="{{ $format }}">
                                                <input type="radio" id="date-{{ $format }}" name="option[date_format]" value="{{ $format }}" @if( $format == Settings::get('date_format') ) checked="checked" @endif>
                                                <span>{{ $value }}</span>
                                            </label>
                                            <br>
                                        @endforeach
                                        <div class="mt-10px mb-10px">
                                            {{ Form::text('option[date_format_custom]', Settings::get('date_format_custom'), array('class' => 'form-control')) }}
                                        </div>
                                        <span class="example">{{ date(Settings::get('date_format_custom')) }}</span>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option[time_format]" class="col-lg-4 col-sm-4 control-label">
                                Time Format
                                
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full selectpicker-format">
                                    <fieldset>
                                        @foreach($timeFormats as $format => $value)
                                            <div class="radio">
                                                <label title="{{ $format }}">

                                                    <input type="radio" name="option[time_format]" value="{{ $format }}" @if( $format == Settings::get('time_format') ) checked="checked" @endif>
                                                    <span>{{ $value }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="mt-10px mb-10px">
                                            {{ Form::text('option[time_format_custom]', Settings::get('time_format_custom'), array('class' => 'form-control')) }}
                                        </div>
                                        <span class="example">{{ date(Settings::get('time_format_custom')) }}</span>
                                    </fieldset>
                                </div>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                                New User Default Role
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Default user role" data-original-title="Default user role"></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    {{ Form::select('option[default_role]', Group::all()->lists('group','id'), Settings::get('default_role'), array('class' => 'selectpicker')) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Post per page
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Display number of post per page" data-original-title="Display number of post per page"></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                    {{ Form::text('option[post_per_page]', Settings::get('post_per_page'), array('class' => 'form-control validate[required, custom[integer]]')) }}
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