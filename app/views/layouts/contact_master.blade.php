<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>

	<link rel="stylesheet" href="{{ URL::to('assets/global/css/bootstrap.css') }}">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ URL::to('assets/admin/css/main.css') }}">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>


	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/css/ie.css') }}" />
	<![endif]-->


	<script type="text/javascript" src="{{ URL::asset('assets/global/js/ext/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>

	<script src="{{ URL::to('assets/admin/js/jquery.js') }}"></script>
	<script src="{{ URL::to('assets/admin/js/bootstrap.min.js') }}"></script>



</head>

	<body>
		@include('user::auth.signup');
	</body>
</html>