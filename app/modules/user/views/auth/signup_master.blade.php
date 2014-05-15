<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js jPanelMenu"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Signup</title>

  <link rel="stylesheet" href="{{ URL::asset('assets/global/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/global/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/site/css/main.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/JvalidationEngine/css/validationEngine.jquery.css') }}">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/jquery-1.10.1.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/ext/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
  <script>
  //<![CDATA[
 var baseURL = '{{ URL::to("/"); }}/';
//]]>
  </script>

</head>
  <body style="background:#000;padding-top:5%;">
  
	 @include('user::auth.signup-form')

  <script type="text/javascript" src="{{ URL::asset('assets/global/js/ext/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::to('assets/admin/js/plugins/select2.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/JvalidationEngine/js/languages/jquery.validationEngine-en.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/JvalidationEngine/js/jquery.validationEngine.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/csk_main.js') }}"></script>
  <script type="text/javascript">
    $(window).load(function(){
      cskMain.Global.validateForm();
      cskMain.Global.oDatePicker();
      cskMain.Global.oPrettySelect();
      
    });
  </script>

  </body>
</html>
