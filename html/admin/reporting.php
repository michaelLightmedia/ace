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
					<a href="reporting.php" class="btn btn-default btn-default-blue mr-5px">
						<span>Overview</span>
					</a>
					<a href="reporting-sales-report.php" class="btn btn-default mr-5px">
						<span>Sales Report</span>
					</a>
					<a href="reporting-sales-order.php" class="btn btn-default mr-5px">
						<span>Sales Order</span>
					</a>
					<a href="reporting-sales-member.php" class="btn btn-default">
						<span>Member</span>
					</a>
				</div>
			</div>

			<div class="t-content">
				<div class="section">
					<div class="row state-overview">
						<div class="col-lg-3 col-sm-6">
							<div class="panel overview__item overview__item--terques">
								<div class="symbol terques">
									<i class="fa fa-user"></i>
								</div>
								<div class="value">
									<h1 class="value__new-members">0</h1>
									<p>New Members</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="panel overview__item overview__item--red">
								<div class="symbol red">
									<i class="fa fa-tags"></i>
								</div>
								<div class="value">
									<h1 class="value__sales">0</h1>
									<p>Sales</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="panel overview__item overview__item--yellow">
								<div class="symbol orange">
									<i class="fa fa-group"></i>
								</div>
								<div class="value">
									<h1 class="value__members">0</h1>
									<p>Members</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="panel overview__item overview__item--blue">
								<div class="symbol blue">
									<i class="fa fa-bar-chart-o"></i>
								</div>
								<div class="value">
									<h1 class="value__profit">0</h1>
									<p>Total Profit</p>
								</div>
							</div>
						</div>
					</div>
					<!-- / State Overview -->
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="border-head">
								<h3>Earning Graph</h3>
							</div>
							<div class="bar-chart">
								<!--custom chart start-->
								<div class="custom-bar-chart">
									<div class="bar">
										<div class="title">JAN</div>
										<div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
									</div>
									<div class="bar doted">
										<div class="title">FEB</div>
										<div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
									</div>
									<div class="bar ">
										<div class="title">MAR</div>
										<div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
									</div>
									<div class="bar doted">
										<div class="title">APR</div>
										<div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
									</div>
									<div class="bar">
										<div class="title">MAY</div>
										<div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
									</div>
									<div class="bar doted">
										<div class="title">JUN</div>
										<div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
									</div>
									<div class="bar">
										<div class="title">JUL</div>
										<div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
									</div>
									<div class="bar doted">
										<div class="title">AUG</div>
										<div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
									</div>
									<div class="bar ">
										<div class="title">SEP</div>
										<div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
									</div>
									<div class="bar doted">
										<div class="title">OCT</div>
										<div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
									</div>
									<div class="bar ">
										<div class="title">NOV</div>
										<div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
									</div>
									<div class="bar doted">
										<div class="title">DEC</div>
										<div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- / Main Chart -->
					<div class="row">
						<div class="col-lg-6 col-sm-6">
							<div class="panel terques-chart">
								<div class="panel-body chart-texture">
									<div class="chart">
										<div class="heading">
											<span>Today</span>
											<strong>$ 57,00 | 15%</strong>
										</div>
										<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
									</div>
								</div>
								<div class="chart-tittle">
									<span class="title">Total Earning</span>
									<span class="value">$, 76,54,678</span>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div class="panel green-chart">
								<div class="panel-body">
									<div class="chart">
										<div class="heading">
											<span>This Month</span>
											<strong>23 Days | 65%</strong>
										</div>
									<div id="barchart"></div>
									</div>
								</div>
								<div class="chart-tittle">
									<span class="title">Total Earning</span>
									<span class="value">$, 76,54,678</span>
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
			<script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>
		    <script src="../../assets/admin/js/plugins/jquery.sparkline.js"></script>
			<script src="../../assets/admin/js/plugins/jquery.easy-pie-chart.js"></script>
			<script src="../../assets/admin/js/plugins/sparkline-chart.js"></script>
			<script src="../../assets/admin/js/plugins/easy-pie-chart.js"></script>

			<script>
				$(window).load(function(){
					gy.Global.init();
					gy.Front.init();
					gy.sideBarDrop.init();
				})

				// custom bar chart

			    if ($(".custom-bar-chart")) {
			        $(".bar").each(function () {
			            var i = $(this).find(".value").html();
			            $(this).find(".value").html("");
			            $(this).find(".value").animate({
			                height: i
			            }, 1000)
			        })
			    }

			    $('.tooltips').tooltip();

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
				        $('.value__new-members').countTo({
				            from: 0,
				            to: 140,
				            speed: 1000,
				            refreshInterval: 50,
				            onComplete: function(value) {
				                console.debug(this);
				            }
				        });

				        $('.value__sales').countTo({
				            from: 0,
				            to: 3800,
				            speed: 1000,
				            refreshInterval: 50,
				            onComplete: function(value) {
				                console.debug(this);
				            }
				        });

				        $('.value__members').countTo({
				            from: 0,
				            to: 600,
				            speed: 1000,
				            refreshInterval: 50,
				            onComplete: function(value) {
				                console.debug(this);
				            }
				        });

				        $('.value__profit').countTo({
				            from: 0,
				            to: 14560,
				            speed: 1000,
				            refreshInterval: 50,
				            onComplete: function(value) {
				                console.debug(this);
				            }
				        });
				    });
				});//]]>  

			</script>
			

		</div>
	</body>
</html>
