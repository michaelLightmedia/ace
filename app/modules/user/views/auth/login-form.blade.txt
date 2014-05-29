<div class="form-login">
    {{ Site::system_messages() }}

    <?php list($error_msg, $error_class) = validator_res($errors,'email') ?>
    <div class="form-group form-group-lg form-group-icon {{ $error_class }}">
        <span class="gytbo gytbo-email"></span>
        <input id="input_email" class=" form-control " type="text" name="email" value="{{{ Input::old('email') }}}" placeholder="email address" autofocus/>
        {{ $error_msg }}
    </div>

    <?php list($error_msg, $error_class) = validator_res($errors,'password') ?>
    <div class="form-group form-group-lg form-group-icon {{ $error_class }}">
        <span class="gytbo gytbo-password"></span>
        <input id="input_password" class=" form-control " type="password" name="password" value="{{{ Input::old('password') }}}" placeholder="password" />
        {{ $error_msg }}
    </div>

    <div class="form-group form-group-action">

        {{ Form::submit('Login', array('class' => 'btn btn-primary btn-lg btn-block')) }}

        <div class="clearfix">
            <div class="checkbox pull-left">
                {{ Form::checkbox('remember', 1) }}
                <label>
                    {{ Form::label('remember', 'Keep me signed in') }}
                </label>
            </div>
            <a href="{{ URL::to('user/request') }}" class="forgot-pass pull-right"><i class="fa fa-question-circle"></i> forgot password?</a>
        </div>
    </div>

</div>