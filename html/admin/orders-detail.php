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
					<li class="active">
						<a href="orders.php">
							<i class="fa fa-shopping-cart"></i> 
							<span>Orders</span>
						</a>
					</li>
					<li>
						<a href="groupbuy.php">
							<i class="fa fa-clock-o"></i> 
							<span>Group Buy</span>
						</a>
					</li>
					<li>
						<a href="promotions.php">
							<i class="fa fa-gift"></i> 
							<span>Promotions</span>
						</a>
					</li>
					<li>
						<a href="services-treatments.php">
							<i class="fa fa-user-md"></i> 
							<span>Service & Treatments</span>
						</a>
					</li>
					<li>
						<a href="events.php">
							<i class="fa fa-calendar-o"></i> 
							<span>Events</span>
						</a>
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
					<li>
						<a href="page.php">
							<i class="fa fa-copy"></i> 
							<span>Pages</span>
						</a>
					</li>
					<li>
						<a href="blog.php">
							<i class="fa fa-bullhorn"></i> 
							<span>Blog Posts</span>
						</a>
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
				<div class="pull-left">
					<h1 class="h3 section__title">
						<i class="fa fa-shopping-cart mr-5px"></i>
						<span>Order</span>
					</h1>
				</div>
				<div class="pull-left mt-2px ml-10px">
					<a href="#" class="text-blue fs-24px">#3234543</a>
				</div>
				<div class="pull-right search">
					<form class="form-inline form-rounded" role="form">
						
						<div class="dataTables_filter" id="sample_1_filter">
							<div class="form-group">
								<i class="fa fa-search"></i>
								<input type="text" aria-controls="sample_1" class="form-control" id="exampleInputEmail2" placeholder="Search Orders">
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="t-content">
				<div class="section">
					<div class="row">
						<div class="col-lg-9 col-md-9">
							<table class="table table-pretty table-striped table-hover border-top" id="sample_1">
								<thead class="table-pretty-head">
									<tr>
										<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
										<th>Name <a href="#"><i class="fa fa-sort"></i></a></th>
										<th>Date <a href="#"><i class="fa fa-sort"></i></a></th>
										<th>Payment Status <a href="#"><i class="fa fa-sort"></i></a></th>
										<th>Total <a href="#"><i class="fa fa-sort"></i></a></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="checkboxes">
											<label class="label_check" for="checkbox-01">
                                            	<input name="" id="checkbox-01" value="1" type="checkbox" checked />
											</label>
										</td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-success">Paid</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-success">Paid</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-danger">Pending</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-success">Paid</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-danger">Pending</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-danger">Pending</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-danger">Pending</span></td>
										<td>$122313</td>
									</tr><tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-danger">Pending</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-success">Paid</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-success">Paid</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-success">Paid</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-danger">Pending</span></td>
										<td>$122313</td>
									</tr>
									<tr>
										<td><input type="checkbox" class="checkboxes" value="1" /></td>
										
										<td><a href="#">Order Name Here</a></td>
										<td>12-12-2013</td>
										
										<td><span class="label label-success">Paid</span></td>
										<td>$122313</td>
									</tr>
								</tbody>
								<thead>
									<tr>
										<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
										<th>Name <a href="#"><i class="fa fa-sort"></i></a></th>
										<th>Date <a href="#"><i class="fa fa-sort"></i></a></th>
										<th>Payment Status <a href="#"><i class="fa fa-sort"></i></a></th>
										<th>Total <a href="#"><i class="fa fa-sort"></i></a></th>
									</tr>
								</thead>
							</table>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="panel">
								<div class="panel__heading panel__heading--small">
									<div class="gravatar-small">
										<img src="../../assets/global/placeholders/avatar1.jpg" alt="">
									</div>
									<div class="mt-5px ml-10px fs-16px">
										<strong>Steffeny Dejito</strong>
									</div>
								</div>
								<div class="panel__content panel__content--offset">
									<ul class="list-group list-group--ugly">
										<li class="list-group-item">
											<i class="fa fa-certificate mr-7px fs-16px"></i>
											Gold
										</li>
										<li class="list-group-item">
											<i class="fa fa-envelope-o mr-5px"></i>
											<a href="#">SteffenyDejoto@gmail.com</a>
										</li>
										<li class="list-group-item">
											<i class="fa fa-map-marker mr-7px fs-20px"></i>
											123 St.Address Details here.
										</li>
										<li class="list-group-item">
											<i class="fa fa-mobile-phone mr-7px fs-20px"></i>
											<span class="text-blue">123213434</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			
			<script src="../../assets/admin/js/plugins/select2.js"></script>
			<script src="../../assets/admin/js/admin.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.scrollTo.min.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.nicescroll.js"></script>
			<script src="../../assets/admin/js/plugins/wysihtml5-0.3.0.js"></script>
    		<script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>
    		<script src="../../assets/admin/js/plugins/jquery.tagsinput.js"></script>
			<script src="../../assets/admin/js/plugins/form-component.js"></script>

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
