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
					<li class="active">
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
						<i class="fa fa-comments mr-5px"></i>
						<span>Ask a Question</span>
					</h1>
				</div>
			</div>

			<div class="t-content t-content--2nd">
				<div class="section section--offset">
					<div class="mail-box">
						<div id="post-scroller" class="post-listing">
							<div id="questions-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
								<div class="carousel-inner">
									<div class="item active">
										<a href="#" class="post post--spread post--unread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread post--active post--unread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread post--unread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
									</div>
									<div class="item">
										<a href="#" class="post post--spread post--unread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread post--active post--unread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread post--unread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
										<a href="#" class="post post--spread">
											<span class="h4 post__title">
												<i class="fa fa-question-circle mr-5px"></i>
												<span>Skin-Face 2</span>
											</span>
											<span class="post__section">
												<span class="post__meta">29/08/2013</span>
												<span class="post__content">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, rerum.
												</span>
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<!-- End Questions Listing -->
						<div class="post-carousel-pagination-bg"></div>
						<div class="post-carousel-pagination">
							<div class="post-carousel-pagination__inner">
								<div class="post-carousel-pagination__core">
									<a class="left carousel-control btn btn-default" href="#questions-carousel" data-slide="prev">
										<i class="fa fa-caret-left mr-5px"></i>
										<span>Prev </span>
									</a>
									<a class="right carousel-control btn btn-default" href="#questions-carousel" data-slide="next">
										<span>Next</span>
										<i class="fa fa-caret-right ml-5px"></i>
									</a>
								</div>
							</div>
						</div>
						
						<div class="post-listing-active">
							<div class="post post--block post--user">
								<div class="gravatar">
									<img src="../../assets/global/placeholders/question-avatar.jpg" alt="">
								</div>
								<div class="post__section formatted">
									<div class="pull-left">
										<h3 class="h4 post__title">John Doe</h3>
									</div>
									<div class="pull-right">
										<span class="post__meta">
											<i class="fa fa-clock-o mr-5px"></i>
											<span>29/08/2013</span>
										</span>
									</div>
									<div class="post__content">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, aperiam, quasi, commodi placeat ex doloremque sunt libero neque tempore laborum sed ratione cum quod sequi fugit iste possimus consectetur voluptate.</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, aperiam, quasi, commodi placeat ex doloremque sunt libero neque tempore?</p>
									</div>
									<div class="post__attach mt-15px">
										<a href="#" class="js-attached-btn btn btn-default btn-sm-2nd">
											<i class="fa fa-paperclip mr-5px"></i>
											Attach</a>
									</div>
									<div class="post__attach-items js-attached-items" style="display: none;">
										<ul class="list-inline m-0px">
											<li>
												<i class="fa fa-paperclip mr-5px"></i>
												Attached1.jpg
											</li>
											<li>
												<i class="fa fa-paperclip mr-5px"></i>
												Attached2.jpg
											</li>
											<li>
												<i class="fa fa-paperclip mr-5px"></i>
												Attached3.jpg
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End Post User -->
							<div class="post post--block post--author">
								<div class="gravatar gravatar--right">
									<img src="../../assets/global/placeholders/question-avatar.jpg" alt="">
								</div>
								<div class="post__section formatted">
									<div class="pull-left">
										<span class="post__meta">
											<i class="fa fa-clock-o mr-5px"></i>
											<span>29/08/2013</span>
										</span>
									</div>
									<div class="pull-right">
										<h3 class="h4 post__title">Dr. John Moves</h3>
										<span class="post__type">Skin Care Expert</span>
									</div>
									
									<div class="post__content">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, aperiam, quasi, commodi placeat ex doloremque sunt libero neque tempore laborum sed ratione cum quod sequi fugit iste possimus consectetur voluptate.</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, aperiam, quasi, commodi placeat ex doloremque sunt libero neque tempore?</p>
									</div>
									<div class="stroke-top">
										<div class="post__content post__content--small">
											<div class="post__sub mb-15px">
												<strong>RECOMMENDATIONS</strong>
											</div>
											<ul class="list-inline list-pretty">
												<li>
													<a href="#">
														<i class="fa fa-chevron-circle-right mr-5px"></i>
														Oily Skin Treatment A
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-chevron-circle-right mr-5px"></i>
														Oily Skin Treatment B
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-chevron-circle-right mr-5px"></i>
														Lorem ipsum dolor sit amet
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-chevron-circle-right mr-5px"></i>
														Lorem ipsum dolor sit amet
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- End Post Message/Reply -->
							<div class="row">
								<div class="col-lg-12">
									<div class="panel mr-15px">
										<textarea class="wysiwyg-textarea form-control" placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="post__sub mb-10px">
										<small>Recommendation</small>
									</div>
									<div class="panel mr-15px">
										<input name="tagsinput" id="tagsinput" class="tagsinput" value="Oily Skin Treatmen A, Oily Skin Treatment B" />
									</div>
								</div>
								<div class="col-lg-12">
									<div class="pull-right mr-15px">
										<span class="message-submit mr-15px">
											Sending Question 
											<i class="fa fa-spinner fa-spin ml-5px"></i>
										</span>
										<button class="btn btn-message-submit btn-blue btn-light-blue">
											<i class="fa fa-question-circle mr-5px"></i>
											Submit
										</button>
									</div>
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