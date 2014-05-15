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

	<link rel="stylesheet" href="../../../assets/global/css/bootstrap.css">
	<link rel="stylesheet" href="../../../assets/global/css/font-awesome.css">
	<link rel="stylesheet" href="../../../assets/admin/css/main.css">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>

	<script src="../../../assets/global/js/libs/modernizr-2.6.2.min.js"></script>
	
	<script src="../../../assets/admin/js/admin.js"></script>
	<script src="../../../assets/admin/js/jquery.js"></script>
	<script src="../../../assets/admin/js/bootstrap.min.js"></script>

	<script>

	</script>

</head>

	<body>
		<div id="container">

			<!--[if lt IE 7]>
				<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
			<![endif]-->

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
									<span class="navbar-avatar-img"><img src="../../../assets/global/placeholders/avatar1.jpg" alt=""></span> 
									Hi <span id="admin-user">Jane Doe</span> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
								</ul>
							</li>
							<li class="nav-icons">
								<a href="../settings-profile.php">
									<i class="fa fa-cog"></i>
								</a>
							</li>
							<li class="nav-icons dropdown">
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
		<!-- Main Sidebar -->
		<aside class="t-sidebar">		
			<nav class="navbar" role="navigation">
				<ul class="nav">
					<li>
						<span class="separator">General</span>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-eye"></i> 
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="orders.php">
							<i class="fa fa-shopping-cart"></i> 
							<span>Orders</span>
						</a>
					</li>
					<li class="sub-menu sub-menu--extended">
						<a href="javascript:;">
							<i class="fa fa-clock-o"></i>
							<span>Group Buy</span>
							<span class="ml-5px arrow fa fa-angle-down"></span>
						</a>
						<ul class="sub">
							<li><a href="groupbuy.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
						</ul>
					</li>
					<li class="sub-menu sub-menu--extended">
						<a href="javascript:;">
							<i class="fa fa-gift"></i>
							<span>Promotions</span>
							<span class="ml-5px arrow fa fa-angle-down"></span>
						</a>
						<ul class="sub">
							<li><a href="promotions.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
						</ul>
					</li>
					<li class="sub-menu sub-menu--extended">
						<a href="javascript:;">
							<i class="fa fa-user-md"></i> 
							<span>Service & Treatments</span>
							<span class="ml-5px arrow fa fa-angle-down"></span>
						</a>
						<ul class="sub">
							<li><a href="services-treatments.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
						</ul>
					</li>
					<li class="sub-menu sub-menu--extended">
						<a href="javascript:;">
							<i class="fa fa-calendar-o"></i> 
							<span>Events</span>
							<span class="ml-5px arrow fa fa-angle-down"></span>
						</a>
						<ul class="sub">
							<li><a href="events.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
						</ul>
					</li>
					<li>
						<a href="reporting.php">
							<i class="fa fa-bar-chart-o"></i> 
							<span>Reporting</span>
						</a>
					</li>
					<li>
						<span class="separator">Members & Interactions</span>
					</li>
					<li class="active">
						<a href="members.php">
							<i class="fa fa-group"></i> 
							<span>Members</span>
						</a>
					</li>
					<li>
						<a href="expert-corner.php">
							<i class="fa fa-question-circle"></i> 
							<span>Ask a Questions</span>
						</a>
					</li>
					<li>
						<span class="separator">Manage the Website</span>
					</li>
					<li class="sub-menu sub-menu--extended">
						<a href="javascript:;">
							<i class="fa fa-copy"></i> 
							<span>Pages</span>
							<span class="ml-5px arrow fa fa-angle-down"></span>
						</a>
						<ul class="sub">
							<li><a href="page.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
						</ul>
					</li>
					<li class="sub-menu sub-menu--extended">
						<a href="javascript:;">
							<i class="fa fa-bullhorn"></i> 
							<span>Blog Posts</span>
							<span class="ml-5px arrow fa fa-angle-down"></span>
						</a>
						<ul class="sub">
							<li><a href="blog.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
						</ul>
					</li>
					<li class="sub-menu sub-menu--extended">
						<a href="javascript:;">
							<i class="fa fa-link"></i>
							<span>Navigation</span>
							<span class="ml-5px arrow fa fa-angle-down"></span>
						</a>
						<ul class="sub">
							<li><a href="navigation.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-clipboard"></i><span>Add New</span></a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-picture-o"></i> 
							<span>Media</span>
						</a>
					</li>
				</ul>
			</nav>
		</aside>
		<!-- // Main Sidebar -->

		<!-- Main Content -->

		<div class="section section--top">
				<div class="pull-left mr-15px">
					<h1 class="h3 section__title">
						<i class="fa fa-group mr-5px"></i>
						<span>Edit Member</span>
					</h1>
				</div>
				<div class="pull-right search">
					<form class="form-inline form-rounded" role="form">
						
						<div class="dataTables_filter" id="sample_1_filter">
							<div class="form-group">
								<i class="fa fa-search"></i>
								<input type="text" aria-controls="sample_1" class="form-control form-pretty form-pretty--white" id="exampleInputtext2" placeholder="Search Members">
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="t-content">
				<form action="">
					<div class="section section--offset-bottom">
						<div class="alert alert-omega alert-small alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-check mr-5px"></i>
                            Successfully saved!
                        </div>
					</div>
					<div class="section">
						<div class="pull-left">
							<a href="#" class="btn btn-default mr-5px">
								<i class="fa fa-edit"></i>
								<span>Save</span>
							</a>
							<a href="#" class="btn btn-default">
								<i class="fa fa-trash-o"></i>
								<span>Delete</span>
							</a>
						</div>
						<div class="pull-right">
							<div class="selectpicker-lg">
								<select class="selectpicker">
									<option>Published</option>
									<option>Unpublished</option>
								</select>
							</div>
						</div>
					</div>
					<div class="section section--offset">
						<div class="panel panel--offset">
							<ul class="nav nav-tabs nav-tabs--pretty">
								<li><a href="membership-details.php">Membership Details</a></li>
								<li><a href="contact-details.php">Contact Details</a></li>
								<li><a href="purchases.php">Purchases</a></li>
								<li class="active"><a href="orders.php">Orders</a></li>
								<li><a href="points.php">Points</a></li>
								<li><a href="friends.php">Friends</a></li>
							</ul>
							<div class="panel__heading panel__heading--white">
								<h1 class="h4 text-blue t--huge">Orders</h1>
							</div>
							<div class="panel__content panel__content--offset">
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-pretty table-pretty--2nd table-striped table-hover border-top" id="sample_1">
											<thead class="table-pretty-head">
												<tr>
													<th>Date</th>
													<th>Invoice No.</th>
													<th>Item</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
												<tr>
													<td>10-02-13</td>
													<td><a href="#">#2343</a></td>
													<td>Skin White</td>
													<td>$45</td>
												</tr>
											</tbody>
										</table>
										<!-- / Purchases Tables -->
										<div class="pull-right mb-30px mr-30px">
											<h2 class="h4">TOTAL: <span class="total-purchases">$2343</span></h2>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- Main Footer -->

			
			<script src="../../../assets/admin/js/plugins/select2.js"></script>
			<script src="../../../assets/admin/js/admin.js"></script>
			<script src="../../../assets/admin/js/plugins/jquery.scrollTo.min.js"></script>
			<script src="../../../assets/admin/js/plugins/jquery.nicescroll.js"></script>

			<script>
				$(window).load(function(){
					gy.Global.init();
					gy.Front.init();
					gy.sideBarDrop.init();
				})
			</script>
			

		</div>
	</body>
</html>
