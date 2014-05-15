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
					<li class="active">
						<a href="media.php">
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
				<div class="pull-left">
					<h1 class="h3 section__title">
						<i class="fa fa-picture-o mr-5px"></i>
						<span>Upload New Media</span>
					</h1>
				</div>
			</div>

			<div class="t-content">
				<div class="section">
					<div class="media-upload js-upload">
						<div class="media-upload-drag-drop">
							<div class="media-upload__title">
								<h3 class="h4">
									Drop files here
									<span>or</span>
								</h3>
								<a href="#" class="mt-7px btn btn-default btn-sm">Select Files</a>
							</div>
						</div>
					</div>
				</div>
				<div class="section section--offset">
					<div class="fileupload-buttons">
						<a href="#" class="btn btn-default mr-5px">
							<i class="fa fa-upload mr-5px"></i>
							Start Upload
						</a>
						<a href="#" class="btn btn-default mr-5px">
							<i class="fa fa-ban mr-5px"></i>
							Cancel Upload
						</a>
					</div>
				</div>
				<div class="section section--offset">
					<table class="table table-pretty table-striped table-hover border-top" id="sample_1">
						<tbody>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
							<tr>
								<td><img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media-thumbnail--small"></td>
								<td>1-120111024081832</td>
								<td style="width: 40%">
									<span>5.38 KB</span>
									<div class="progress progress-tiny progress-striped active">
										<div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</td>
								<td>
									<div class="mt-7px flow-right">
										<a href="#" class="btn btn-default btn-sm mr-5px">Start</a>
										<a href="#" class="btn btn-default btn-sm">Cancel</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
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