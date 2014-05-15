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
					<li class="sub-menu sub-menu--extended active open">
						<a href="javascript:;">
							<i class="fa fa-copy"></i> 
							<span>Pages</span>
							<span class="ml-5px arrow fa fa-angle-down open"></span>
						</a>
						<ul class="sub" style="display: block">
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
						<i class="fa fa-bullhorn mr-5px"></i>
						<span>Pages</span>
					</h1>
				</div>
				<div class="pull-left">
					<a href="add-page.php" class="btn btn-blue btn-uc btn-sm-2nd mt-5px">
						<i class="fa fa-plus mr-5px"></i>
						<span>Add New</span>
					</a>
				</div>
				<div class="pull-right search">
					<form class="form-inline form-rounded" role="form">
						
						<div class="dataTables_filter" id="sample_1_filter">
							<div class="form-group">
								<i class="fa fa-search"></i>
								<input type="text" aria-controls="sample_1" class="form-control" id="exampleInputEmail2" placeholder="Search Page">
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="t-content">
				<div class="section">
					<div class="pull-left">
						<a href="#" class="btn btn-default">
							<i class="fa fa-trash-o"></i>
							<span>Delete</span>
						</a>
					</div>
					<div class="pull-right">
						<div class="selectpicker-sm">
							<select class="selectpicker">
								<option>10</option>
								<option>25</option>
								<option>50</option>
								<option>100</option>
							</select>
						</div>
					</div>
				</div>
				<div class="section section--offset">
					<table class="table table-pretty table-striped table-hover border-top" id="sample_1">
						<thead class="table-pretty-head">
							<tr>
								<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
								<th>Name <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Category <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Date <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Comments <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Status <a href="#"><i class="fa fa-sort"></i></a></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-warning">Draft</span></td>
							</tr>	
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-warning">Draft</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-success">Published</span></td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkboxes" value="1" /></td>
								<td><a href="add-page.php">Lorem ipsum dolor sit amet</a></td>
								<td>Uncategories</td>
								<td>12-5-2013</td>
								<td>2</td>
								<td><span class="label label-warning">Draft</span></td>
							</tr>					
						</tbody>
						<thead>
							<tr>
								<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
								<th>Name <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Category <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Date <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Comments <a href="#"><i class="fa fa-sort"></i></a></th>
								<th>Status <a href="#"><i class="fa fa-sort"></i></a></th>
							</tr>
						</thead>
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
