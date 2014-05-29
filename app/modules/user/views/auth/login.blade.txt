@extends('layouts.auth_master')

@section('right-header-content')
    <li>
        <a href="{{ URL::to('/signup') }}" class="btn btn-bordered">
            Sign Up <i class="fa fa-long-arrow-right"></i>
        </a>
    </li>
@overwrite

@section('content')

<div class="banner banner-home banner-l3 banner-full">
    <div class="container">
        <div class="banner-form banner-form-show">

            <h1 class="title">Login to your account</h1>

            {{ Form::open(array('route' => 'login', 'role' => 'form', 'class' => '')) }}

                @include('user::auth.login-form')

            {{ Form::close() }}

            <div class="banner-form-footer">
               <!-- <p>Dont't have an account yet? <a href="{{ URL::to("/signup") }}">Sign up »</a></p>-->
            </div>

        </div>
    </div>
</div>
@stop
