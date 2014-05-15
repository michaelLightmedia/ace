<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie-9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js jPanelMenu"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> {{ Site::title(); }} </title>
    <meta name="description" content="{{ Site::metaDescription(); }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/global/css/bootstrap.min.css') }}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/JvalidationEngine/css/validationEngine.jquery.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/tagsinput/app.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/site/css/icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/site/css/main.css') }}">

    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/css/ie.css') }}" />
    <![endif]-->

    <script type="text/javascript" src="{{ URL::asset('assets/global/js/ext/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/jquery-1.10.1.js') }}"></script>
    <script>
        //<![CDATA[
        var baseURL = '{{ URL::to("/"); }}/';
        //]]>
        jQuery(function(){
            var visitortime = new Date();
            var visitortimezone = -visitortime.getTimezoneOffset()/60;
      @if(!Session::has('timezoneOffset'))
            //check if timezone has set
            jQuery.post(baseURL+'offsetTimeZone',{offset:visitortimezone},function(data){
                //location.reload(true);
            });
      @endif
        });
    </script>
</head>
<body>

<div class="navbar navbar-main navbar-fixed-top navbar-l2">
    <div class="container">

        <div class="navbar-left">
            <div class="navbar-collapse collapse">
                <ul>
                    <li>
                        <a href="/" class="btn btn-bordered">
                            <i class="fa fa-long-arrow-left"></i> Back to Website
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand navbar-brand" href="/">GYTBO</a>
        </div>

        <div class="navbar-right">
            <div class="navbar-collapse collapse">
                <ul>
                    <li>
                        <a href="" class="btn btn-bordered">
                            Sign In <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="banner banner-full">
    <div class="container">
        <div class="banner-heading">
            <h1 class="banner-title">Create Account</h1>
            <p class="banner-desc">Please fill up the form below and tell us a little more about you</p>
            <a href="#" class="btn btn-yellow" style="display: none;">Get Started!</a>
        </div>
        <div class="banner-form banner-form-signup banner-form-show">
            <span class="form-icon"></span>
            <div class="banner-form-body">
                <div class="form-group">
                    <label for="#" class="label-control">Email</label>
                    <div class="form-group-control">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="#" class="label-control">Password</label>
                            <div class="form-group-control">
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="#" class="label-control">Confirm Password</label>
                            <div class="form-group-control">
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="#" class="label-control">Security Question</label>
                    <div class="form-group-control">
                        <select type="text" class="form-control select2">
                            <option value="">What was the name of the street you first lived in?</option>
                            <option value="">What is your pet's name?</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="#" class="label-control">Answer</label>
                    <div class="form-group-control">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group form-group-action">
                <div class="clearfix">
                    <div class="form-group-vertical">
                        <div class="checkbox pull-left">
                            <label><input type="checkbox"> Accept <a href="">Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block">I want to start my Tax Return  </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        var visitortime = new Date();
        var visitortimezone = -visitortime.getTimezoneOffset()/60;

        $('#timezoneOffset').val(visitortimezone);
    });
</script>