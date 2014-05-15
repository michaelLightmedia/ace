@extends('layouts.auth_master')

@section('right-header-content')
<li>
    <a href="{{ URL::to('/login') }}" class="btn btn-bordered">
        Sign in <i class="fa fa-long-arrow-right"></i>
    </a>
</li>
@overwrite


@section('content')
<form action="#" method="POST" >

<div class="banner banner-full">
    <div class="container">
        <div class="banner-heading">
            <h1 class="banner-title">Create Account</h1>
            <p class="banner-desc">Please fill up the form below and tell us a little more about you</p>
            <a href="#" class="btn btn-yellow" style="display: none;">Get Started!</a>
        </div>
        <div class="banner-form banner-form-signup banner-form-show form-signup">
            <div class="form-icon"></div>
            <div class="banner-form-body">

                {{ Site::system_messages() }}

                <?php list($error_msg, $error_class) = validator_res($errors,'email') ?>
                <div class="form-group form-group-lg {{ $error_class }}">
                    <label for="#" class="label-control">Email</label>
                    <div class="form-group-control">
                        <input id="input_email" name="email" value="{{{ Input::old('email') }}}" type="text" class="form-control" placeholder="Email address" autofocus>
                        {{ $error_msg }}
                    </div>
                </div>

                <div class="row">
                    <?php list($error_msg, $error_class) = validator_res($errors,'firstname') ?>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-left {{ $error_class }}">
                            <label for="#input_firstname" class="label-control">First name</label>
                            <div class="form-group-control">
                                <input id="input_firstname" type="text" name="firstname" class="form-control" value="{{{ Input::old('firstname') }}}" placeholder="First name">
                                {{ $error_msg }}
                            </div>
                        </div>
                    </div>

                    <?php list($error_msg, $error_class) = validator_res($errors,'lastname') ?>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg {{ $error_class }}">
                            <label for="#input_lastname" class="label-control">Last name</label>
                            <div class="form-group-control">
                                <input id="input_lastname" name="lastname" type="text" value="{{{ Input::old('lastname') }}}" class="form-control" placeholder="Last name">
                                {{ $error_msg }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php list($error_msg, $error_class) = validator_res($errors,'password') ?>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg form-group-left {{ $error_class }}">
                            <label for="#input_password" class="label-control">Password</label>
                            <div class="form-group-control">
                                <input id="input_password" type="password" name="password" class="form-control" value="{{{ Input::old('password') }}}" placeholder="Your Password">
                                {{ $error_msg }}
                            </div>
                        </div>
                    </div>

                    <?php list($error_msg, $error_class) = validator_res($errors,'password_confirmation') ?>
                    <div class="col-md-6">
                        <div class="form-group form-group-lg {{ $error_class }}">
                            <label for="#input_password_confirmation" class="label-control">Confirm Password</label>
                            <div class="form-group-control">
                                <input id="input_password_confirmation" name="password_confirmation" value="{{ Input::old("password_confirmation") }}" type="password" class="form-control" placeholder="Confirm your password">
                                {{ $error_msg }}
                            </div>
                        </div>
                    </div>
                </div>

                <?php list($error_msg, $error_class) = validator_res($errors,'security_q') ?>
                <div class="form-group form-group-lg {{ $error_class }}">
                    <label for="#" class="label-control">Security Question</label>
                    <div class="form-group-control">
                        <select type="text" class="form-control select2 {{ $error_class }}" name="security_q">
                            <option <?php echo is_selected(1,Input::old('security_q'),'question_1') ?> value="question_1">What was the name of the street you first lived in?</option>
                            <option <?php echo is_selected(1,Input::old('security_q'),'question_2') ?> value="question_2">What is your pet's name?</option>
                        </select>
                        {{ $error_msg }}
                    </div>
                </div>

                <?php list($error_msg, $error_class) = validator_res($errors,'security_q_answer') ?>
                <div class="form-group form-group-lg {{ $error_class }}">
                    <label for="#input_question_1" class="label-control">Answer</label>
                    <div class="form-group-control">
                        <input id="input_question_1" name="security_q_answer" type="text" value="{{ Input::old('security_q_answer') }}" class="form-control">
                        {{ $error_msg }}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-lg form-group-action">

                <?php list($error_msg, $error_class) = validator_res($errors,'terms_&_conditions') ?>

                <div class="form-group-reset {{ $error_class }}">
                    <div class="form-group-control">
                        <label><input <?php echo is_checked(1,Input::old('terms_&_conditions')) ?> id="input_terms_&_conditions" name="terms_&_conditions" type="checkbox" value="1"> Accept <a href="">Terms and Conditions</a></label>
                    </div>
                    {{ $error_msg }}
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">I want to start my Tax Return  </button>
            </div>
        </div>
    </div>
</div>
</form>

@stop
