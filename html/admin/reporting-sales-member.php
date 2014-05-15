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
					<li class="active">
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
				<div class="pull-left mr-15px">
					<h1 class="h3 section__title">
						<i class="fa fa-bar-chart-o mr-5px"></i>
						<span>Reporting</span>
					</h1>
				</div>
		
				<div class="pull-right search">
					<a href="reporting.php" class="btn btn-default mr-5px">
						<span>Overview</span>
					</a>
					<a href="reporting-sales-report.php" class="btn btn-default mr-5px">
						<span>Sales Report</span>
					</a>
					<a href="reporting-sales-order.php" class="btn btn-default mr-5px">
						<span>Sales Order</span>
					</a>
					<a href="reporting-sales-member.php" class="btn btn-default btn-default-blue ">
						<span>Member</span>
					</a>
				</div>
			</div>

			<div class="t-content">
				<div class="section">
					<div class="panel panel-success">
						<div class="panel__heading">
							<h2 class="h4">Sales Orders</h2>
						</div>
						<div class="panel__content">
							<div class="row stroke-bottom">
								<div class="col-lg-3 col-md-6 col-sm-6">
									<div class="datepicker-wrap form-group">
			                            <div class="row">
			                            	<div class="datepicker-2-cols">
			                            		<div class="col-lg-4 col-sm-4">
				                            		<div class="date datepicker">
				                            			<div class="add-on add-on--from">
					                            			<input type="text" id="date-from" value="from" class="form-ugly">
					                            		</div>
				                            		</div>
				                            	</div>
				                            	<div class="col-lg-3 col-sm-4 flow-center">
				                            		-
				                            	</div>
				                            	<div class="col-lg-5 col-sm-4">
				                            		<div class="date datepicker">
				                            			<div class="add-on add-on--from">
					                            			<input type="text" id="date-from" value="to" class="form-ugly">
					                            		</div>
				                            		</div>
				                            	</div>
			                            	</div>
			                            </div>
			                            <input type="text" class="form-control" placeholder="">
			                            <div class="datepicker-calendar">
			                                <i class="fa fa-calendar"></i>
			                            </div>
			                        </div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Referrals">
									</div>
								</div>
								
								<div class="col-lg-3 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" value="Loyalty Points">
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6">
									<button class="btn btn-default btn-info btn-block">Generate Report</button>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-10 col-sm-10">
									<div class="mt-15px mb-15px">
										<div class="sales-reports-total pull-left">
											<h4 class="sales-reports-total-title">Total</h4>
											<span class="sales-reports-price">1,500</span>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-sm-2">
									<div class="mt-15px mb-15px">
										<div class="sales-reports-print pull-right">
											<a href="#" class="btn btn-default js-print">
												<i class="fa fa-print mr-5px"></i>
												Print
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section section--offset">
					<table class="table table-pretty table-striped table-hover border-top" id="sample_1">
						<thead class="table-pretty-head">
							<tr>
								<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
								<th>Name <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Username <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Email <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Membership <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Date Joined <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Status <a href="#"><i class="fa fa-sort"></i></a></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-elite-gold">Elite GOLD</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-premium">Premium</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-gold">GOLD</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-silver">Silver</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-premium">Premium</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-gold">GOLD</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-elite-gold">Elite GOLD</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-premium">Premium</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-silver">Silver</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-elite-gold">Elite GOLD</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-elite-gold">Elite GOLD</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="#">John Doe</a></td>
								<td>johndoe</td>
								<td><a href="#">johndoe@gmail.com</a></td>
								<td><span class="label label-elite-gold">Elite GOLD</span></td>
								<td>12-12-13</td>
								<td><span class="label label-success">Active</span></td>
							</tr>
						</tbody>
					</table>
					<div class="pull-left">
						<div class="table-results">
							Showing 1 to 10 of 25 entries
						</div>
					</div>
					<div class="pull-right">
						<ul class="pagination">
							<li class="prev disabled"><a href="#"><i class="fa fa-fast-backward"></i></a></li>
							<li class="prev disabled"><a href="#"><i class="fa fa-backward"></i></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#"><i class="fa fa-forward"></i></a></li>
							<li><a href="#"><i class="fa fa-fast-forward"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			
			<script src="../../assets/admin/js/plugins/select2.js"></script>
			<script src="../../assets/admin/js/admin.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.scrollTo.min.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.nicescroll.js"></script>
			<script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>
			<script src="../../assets/global/js/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

			<script>
				$(window).load(function(){
					gy.Global.init();
					gy.Front.init();
					gy.sideBarDrop.init();
					gy.DatePicker.init();
				})
			</script>
			

		</div>
	</body>
</html>
