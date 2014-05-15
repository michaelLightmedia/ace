<!-- Includes all libs -->
<?php include 'layouts/header.php'; ?>

		<!-- Main Sidebar -->
		<aside class="t-sidebar">		
			<nav class="navbar" role="navigation">
				<ul class="nav">
					<li>
						<span class="separator">General</span>
					</li>
					<li>
						<a href="index.php">
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
					<li>
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
						<i class="fa fa-cog mr-5px"></i>
						<span>Settings</span>
					</h1>
				</div>
			</div>

			<div class="t-content">
				<form action="">
					<div class="section">
						<div class="row">
							<div class="col-lg-2 col-md-3">
								<div class="list-group list-group--2nd">
									<a href="settings-profile.php" class="list-group-item active">
										<i class="fa fa-user mr-5px"></i>
										Your Profile
									</a>
									<a href="settings-points.php" class="list-group-item">
										<i class="fa fa-smile-o mr-5px"></i>
										Loyalty Points
									</a>								</div>
							</div>
							<div class="col-lg-10 col-md-9">
								<div class="panel">
									<div class="panel__heading">
										<h1 class="h4">Profile</h1>
									</div>
									<div class="panel__content">
										<div class="row">
											<div class="col-lg-7">
												<div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
													<div class="form-group">
														<label for="" class="col-lg-4 col-md-5 col-sm-5 control-label">First Name</label>
														<div class="col-lg-8 col-md-7 col-sm-7">
															<input type="text" class="form-control" id="" autofocus>
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-lg-4 col-md-5 col-sm-5 control-label">Last Name</label>
														<div class="col-lg-8 col-md-7 col-sm-7">
															<input type="text" class="form-control" id="">
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-lg-4 col-md-5 col-sm-5 control-label">Username</label>
														<div class="col-lg-8 col-md-7 col-sm-7">
															<input type="text" class="form-control" id="">
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-lg-4 col-md-5 col-sm-5 control-label">Role</label>
														<div class="col-lg-8 col-md-7 col-sm-7">
															<div class="selectpicker-full">
																<select class="selectpicker">
																	<option>Select Category</option>
																	<option>Category 1</option>
																	<option>Category 2</option>
																	<option>Category 3</option>
																</select>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-lg-4 col-md-5 col-sm-5 control-label">Email</label>
														<div class="col-lg-8 col-md-7 col-sm-7">
															<input type="text" class="form-control" id="">
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-lg-4 col-md-5 col-sm-5 control-label">Password</label>
														<div class="col-lg-8 col-md-7 col-sm-7">
															<input type="password" class="form-control" id="">
														</div>
													</div>
													<div class="form-group">
														<label for="" class="col-lg-4 col-md-5 col-sm-5 control-label">Repeat New Password</label>
														<div class="col-lg-8 col-md-7 col-sm-7">
															<input type="text" class="form-control" id="">
														</div>
													</div>
												</div>
											</div>
											<!-- / Settings Form -->
											<div class="col-lg-5">
												<div class="block--gray">
													<div class="gravatar-pretty">
														<img src="../../assets/global/placeholders/avatar-2.jpg" alt="">
														<span class="mt-15px label label-photo label-huge">Primary Photo</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<!-- Main Footer -->
			
			<script src="../../assets/admin/js/plugins/select2.js"></script>			
			<script src="../../assets/admin/js/admin.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.scrollTo.min.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.nicescroll.js"></script>
			<script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>

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