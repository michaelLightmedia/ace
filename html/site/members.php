<?php include 'layouts/header.php'; ?>

<div class="section section--gray section--offset-top">
	<div class="container">
		<h1 class="h3 section__title">
			Welcome, <span class="text-blue">Claire!</span>
		</h1>
	</div>
</div>

<div class="section">
	<div class="container">
		<ul class="nav nav-tabs nav-tabs--pretty">
			<li class="active">
				<a href="members.php">
					Your Membership
					<span class="fa-triangle"></span>
				</a>
			</li>
			<li>
				<a href="members-contact-details.php">
					Contact Details
				<span class="fa-triangle"></span>
				</a>
			</li>
			<li>
				<a href="members-purchases.php">
					Your Purchases
					<span class="fa-triangle"></span>
				</a>
			</li>
			<li>
				<a href="members-orders.php">
					Your Orders
					<span class="fa-triangle"></span>
				</a>
			</li>
			<li>
				<a href="members-points.php">
					Your Points
					<span class="fa-triangle"></span>
				</a>
			</li>
			<li>
				<a href="members-friends.php">
					Your Friends
					<span class="fa-triangle"></span>
				</a>
			</li>
		</ul>
		<!-- / Listings -->
		<div class="panel">
			
			<div class="panel__heading panel__heading--huge">
				<div class="pull-left">
					<h1 class="h2 t--huge">Membership Details</h1>
				</div>
				<div class="pull-right">
					<a href="#" class="btn btn-blue btn-pretty">
						<strong>CONTACT US</strong> if info here is incorrect
					</a>
				</div>
			</div>
			<div class="panel__content panel__content--pretty">
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Username</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty" id="" placeholder="Yogi">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Name</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty" id="" placeholder="Claire Seet" >
								</div>
							</div>
							<br>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">NRIC</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty" id="" placeholder="SXXXXXXXXXXXX" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Gender</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="Female">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Birthday</label>
								<div class="col-lg-8 col-sm-8">
									<div class="date datepicker">
										<div class="add-on">
											<input type="text" class="form-control form-pretty form-pretty--white" placeholder="12/13/89">
										</div>
										<div class="datepicker-calendar">
											<i class="fa fa-calendar"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">
									Membership
									<i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Your Membership Details"></i>
								</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty" id="" placeholder="Silver" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Date Joined</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty" id="" placeholder="1-Jan-2013" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label text-blue text-underline">CSK $</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty" id="" placeholder="10" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'layouts/register.php'; ?>
<?php include 'layouts/login-lightbox.php'; ?>
<?php include 'layouts/footer.php'; ?>