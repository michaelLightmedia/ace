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

	<link rel="stylesheet" href="../../assets/global/css/bootstrap.css">
	<link rel="stylesheet" href="../../assets/global/css/font-awesome.css">
	<link rel="stylesheet" href="../../assets/admin/css/main.css">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
	
	<script src="../../assets/global/js/libs/modernizr-2.6.2.min.js"></script>

	<script src="../../assets/admin/js/admin.js"></script>
	<script src="../../assets/admin/js/jquery.js"></script>
	<script src="../../assets/admin/js/bootstrap.min.js"></script>

	<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('.preloader__brand').fadeOut().addClass('preloader__brand--fade'); // will first fade out the loading animation
            $('.preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350);
        })
    //]]>
</script> 

</head>

	<body>
		<div id="container">

			<!--[if lt IE 7]>
				<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
			<![endif]-->

			<div class="preloader">
				<div class="preloader__brand">&nbsp;</div>
			</div>

			<div class="modal-backdrop--mobile alert fade in">
				<div class="modal-overlay--mobile">
					<p>Sorry for the incovenience, but you are using a device that is not supported. </p>
					<p>Some features might not be seen, Please use tablet or desktop instead.</p>
				</div>
			</div>

			<header class="t-header">

				<div class="navbar navbar-default navbar-fixed-top">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">ClearSK</a>
					</div>
					<div class="pull-left navbar-views">
						<a href="#">
							<i class="fa fa-th"></i>
							<span>View your Website</span>
						</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown active">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<span class="navbar-avatar-img"><img src="../../assets/global/placeholders/avatar1.jpg" alt=""></span> 
									Hi <span id="admin-user">Jane Doe</span> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
								</ul>
							</li>
							<li class="nav-icons dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-cog"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="settings-profile.php">Your Profile</a></li>
									<li><a href="settings-points.php">Loyalty Points</a></li>
								</ul>
							</li>
							<li class="nav-icons nav-icons--alert dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell"></i>
								</a>
								<ul class="dropdown-menu extended notification">
									<div class="notify-arrow notify-arrow-blue"></div>
									<li>
										<p class="blue">You have 1 new notification</p>
									</li>
									<li>
										<a href="#">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ab!
										</a>
									</li>
								</ul>
							</li>
							<li>
								<button type="button" class="navbar-toggle">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</header>