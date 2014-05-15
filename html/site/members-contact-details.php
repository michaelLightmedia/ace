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
			<li>
				<a href="members.php">
					Your Membership
					<span class="fa-triangle"></span>
				</a>
			</li>
			<li class="active">
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
					<h1 class="h2 t--huge">Contact Details</h1>
				</div>
			</div>
			<div class="panel__content panel__content--pretty">
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">CSK $</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Address</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Address 2</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Postal Code</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="" >
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Country</label>
								<div class="col-lg-8 col-sm-8">
									<?php include 'layouts/select-country.php' ?>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-4 col-sm-4 control-label">Mobile</label>
								<div class="col-lg-8 col-sm-8">
									<input type="text" class="form-control form-pretty form-pretty--white" id="" placeholder="" >
								</div>
							</div>
							<div class="form-group m-30px">
								<div class="col-sm-offset-4 col-sm-10">
									<strong>Subscribe for Newsletter</strong>
									<div class="checkbox">
										<label>
											<input type="checkbox" checked> 
											Yes (By Default, uncheckbox to unsubscribe from mailing list)
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel__footer">
				<div class="pull-right">
					<button class="btn btn-lg btn-blue btn-pretty">
						<strong>EDIT / SAVE</strong>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'layouts/register.php'; ?>
<?php include 'layouts/login-lightbox.php'; ?>
<?php include 'layouts/footer.php'; ?>