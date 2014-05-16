<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="en" />
	<title></title>

	<link rel="stylesheet" href="{{ URL::to('assets/global/css/bootstrap.css') }}">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ URL::to('assets/admin/css/main.css') }}">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
	
	<script src="{{ URL::to('assets/global/js/libs/modernizr-2.6.2.min.js') }}"></script>

	<script src="{{ URL::to('assets/admin/js/admin.js') }}"></script>
	<script src="{{ URL::to('assets/admin/js/jquery.js') }}"></script>
	<script src="{{ URL::to('assets/admin/js/bootstrap.min.js') }}"></script>

	<script>

	</script>

</head>

	<body class="page-error">
		<div id="container">

			<!--[if lt IE 7]>
				<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
			<![endif]-->

				
			<div class="error-container">
				<div class="error__dot-wrap">
					<div class="error__dot"></div>
					<div class="error__dot error__dot2"></div>
					<div class="error__dot error__dot3"></div>
					
				</div>
				<h1 class="error__title">404</h1>
				<h2 class="error__description">page not found</h2>
				<div class="error__content">
					Something went wrong or that page doesn't exist yet. 
					<a href="{{ URL::previous() }}" class="error__link">Return Home</a> <!-- Redirect::back() -->
				</div>
				<a href="/admin/dashboard">
					<div class="navbar-brand error__brand"></div>
				</a>
			</div>
		</div>

	</body>

</html>