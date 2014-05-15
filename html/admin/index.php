<!-- Includes all libs -->
<?php include 'layouts/header.php'; ?>

			<!-- Main Sidebar -->
			<aside class="t-sidebar">		
				<nav class="navbar" role="navigation">
					<ul class="nav">
						<li>
							<span class="separator">General</span>
						</li>
						<li class="active">
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
							<i class="fa fa-eye mr-5px"></i>
							<span>Dashboard</span>
						</h1>
					</div>
					<div class="pull-right search">
						<form class="form-inline form-rounded" role="form">
							<div class="form-group">
								<i class="fa fa-search"></i>
								<input type="search" class="form-control" placeholder="Search..">
							</div>
						</form>
					</div>
				</div>
			<div class="t-content">
				<div class="section section--stroke">
					<h2 class="h4 section__title">Quick Start</h2>
					<div class="section__buttons">
						<a href="members.php" class="btn btn-default btn-md btn-default-blue btn-uc">
							<i class="fa fa-user mr-7px"></i>
							<span>Add Member</span>
						</a>
						<a href="add-blog-post.php" class="btn btn-default btn-md btn-default-blue btn-uc">
							<i class="fa fa-bullhorn mr-7px"></i>
							<span>Add Blog Post</span>
						</a>
						<a href="add-page.php" class="btn btn-default btn-md btn-default-blue btn-uc">
							<i class="fa fa-copy mr-7px"></i>
							<span>Add Page</span>
						</a>
						<a href="add-services-treatments.php" class="btn btn-default btn-md btn-default-blue btn-uc">
							<i class="fa fa-check-circle mr-7px"></i>
							<span>Add Services</span>
						</a>
					</div>
				</div>
				<div class="section section--box">
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<h3 class="h4 section__title mb-15px">Sales</h3>
							<div class="section__content">
								<div class="row">
									<div class="col-lg-12 col-sm-12">
										<div class="box box--white box--flow-center stroke-bottom">
											<h3 class="h5 box__title">This Month</h3>
											<span class="box__hr"></span>
											<div class="box__content">
												<div class="box__counter">
													<span class="counter__icon">
														$
													</span>
													<span class="counter__views counter__views--month">
														0
													</span>
												</div>
											</div>
											<a href="#" class="btn btn-primary btn-uc btn-blue btn-lg-2nd">120 Orders</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-sm-6 stroke-right">
										<div class="box box--small box--teal box--flow-center">
											<h3 class="h5 box__title">Today</h3>
											<span class="box__hr"></span>
											<div class="box__content">
												<div class="box__counter">
													<span class="counter__icon">
														$
													</span>
													<span class="counter__views counter__views--today">
														0
													</span>
												</div>
											</div>
											<a href="#" class="btn btn-primary btn-uc btn-teal btn-sm--3rd">120 Orders</a>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 ">
										<div class="box box--small box--black box--flow-center">
											<h3 class="h5 box__title">LAST WEEK</h3>
											<span class="box__hr"></span>
											<div class="box__content">
												<div class="box__counter">
													<span class="counter__icon">
														$
													</span>
													<span class="counter__views counter__views--last-week">
														0
													</span>
												</div>
											</div>
											<a href="#" class="btn btn-primary btn-uc btn-black btn-sm--3rd">120 Orders</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12">
							<h3 class="h4 section__title mb-15px">Manage</h3>
							<div class="section__content">
								<div class="row">
									<div class="col-lg-4 col-sm-4 stroke-right stroke-bottom block">
										<a href="members.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-user"></i>
											<span>Members</span>
										</a>
									</div>
									<div class="col-lg-4 col-sm-4 stroke-right stroke-bottom block">
										<a href="#" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-comments"></i>
											<span>Comments</span>
										</a>
									</div>
									<div class="col-lg-4 col-sm-4 stroke-bottom block">
										<a href="blog.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-bullhorn"></i>
											<span>Blog Posts</span>
										</a>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-sm-4 stroke-right stroke-bottom block">
										<a href="groupbuy.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-clock-o"></i>
											<span>Group Buy</span>
										</a>
									</div>
									<div class="col-lg-4 col-sm-4 stroke-right stroke-bottom block">
										<a href="promotions.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-gift"></i>
											<span>Promotions</span>
										</a>
									</div>
									<div class="col-lg-4 col-sm-4 stroke-bottom block">
										<a href="services-treatments.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-user-md"></i>
											<span>Services & Treatments</span>
										</a>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-sm-4 stroke-right block">
										<a href="expert-corner.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-question-circle"></i>
											<span>Ask a Question</span>
										</a>
									</div>
									<div class="col-lg-4 col-sm-4 stroke-right block">
										<a href="page.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-file-o"></i>
											<span>Page</span>
										</a>
									</div>
									<div class="col-lg-4 col-sm-4 block">
										<a href="events.php" class="box box--menu box--flow-center">
											<i class="box__icon fa fa-calendar-o"></i>
											<span>Events</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="../../assets/admin/js/plugins/select2.js"></script>
			<script src="../../assets/admin/js/admin.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.scrollTo.min.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.nicescroll.js"></script>
			<script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>

			<script type='text/javascript'>//<![CDATA[ 
			$(function(){
			(function($) {
			    $.fn.countTo = function(options) {
			        // merge the default plugin settings with the custom options
			        options = $.extend({}, $.fn.countTo.defaults, options || {});

			        // how many times to update the value, and how much to increment the value on each update
			        var loops = Math.ceil(options.speed / options.refreshInterval),
			            increment = (options.to - options.from) / loops;

			        return $(this).each(function() {
			            var _this = this,
			                loopCount = 0,
			                value = options.from,
			                interval = setInterval(updateTimer, options.refreshInterval);

			            function updateTimer() {
			                value += increment;
			                loopCount++;
			                $(_this).html(value.toFixed(options.decimals));

			                if (typeof(options.onUpdate) == 'function') {
			                    options.onUpdate.call(_this, value);
			                }

			                if (loopCount >= loops) {
			                    clearInterval(interval);
			                    value = options.to;

			                    if (typeof(options.onComplete) == 'function') {
			                        options.onComplete.call(_this, value);
			                    }
			                }
			            }
			        });
			    };

			    $.fn.countTo.defaults = {
			        from: 0,  // the number the element should start at
			        to: 100,  // the number the element should end at
			        speed: 1000,  // how long it should take to count between the target numbers
			        refreshInterval: 100,  // how often the element should be updated
			        decimals: 0,  // the number of decimal places to show
			        onUpdate: null,  // callback method for every time the element is updated,
			        onComplete: null,  // callback method for when the element finishes updating
			    };
			})(jQuery);

			jQuery(function($) {
			        $('.counter__views--month').countTo({
			            from: 0,
			            to: 84685,
			            speed: 1000,
			            refreshInterval: 50,
			            onComplete: function(value) {
			                console.debug(this);
			            }
			        });

			         $('.counter__views--today').countTo({
			            from: 0,
			            to: 21685,
			            speed: 1200,
			            refreshInterval: 50,
			            onComplete: function(value) {
			                console.debug(this);
			            }
			        });

			         $('.counter__views--last-week').countTo({
			            from: 0,
			            to: 1685,
			            speed: 1500,
			            refreshInterval: 50,
			            onComplete: function(value) {
			                console.debug(this);
			            }
			        });
			    });
			});//]]>  

			</script>

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
