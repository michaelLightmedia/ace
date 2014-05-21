@extends('layouts.auth_master')

@section('content')
<div class="banner banner-home banner-l3 banner-full">
    <div class="container">
        <div class="banner-form banner-form-show">
            <h1 class="title">Reset Passsword</h1>
     {{ Form::open(array(
        "url" => URL::route("user/reset") . $token,
        "autocomplete" => "off",
        "id" => "gyForm",
        'role' => 'form', 'class' => 'form-horizontal',  
    )) }}
        <div class="form-login">
        <div class="form-group form-ease-in">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                {{ Form::text('email', Input::get('email'), array('class' => 'form-control  validate[required, minSize[6]]', 'placeholder' => 'Email', 'autofocus')) }}
            </div>
        </div>
        <div class="form-group form-ease-in--2s">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                {{ Form::password('password',array('class' => 'form-control  validate[required, minSize[6]]')) }}
            </div>
        </div>
        <div class="form-group form-ease-in--2s">
            <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
                {{ Form::password('password_confirmation',array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group form-ease-in--3s">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ URL::to('/') }}">&larr; Back to Sitetbo</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ URL::to('login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group form-ease-in--4s">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('reset', array('class' => 'btn btn-blue btn-in')) }}
            </div>
        </div>
        {{ Site::system_messages() }}
    </div>

    {{ Form::close() }}
    </div>
    </div>
</div>
@stop


