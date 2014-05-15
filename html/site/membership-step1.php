<?php include 'layouts/header.php'; ?>

<div class="section section--gray section--offset-top section--offset-bottom-lg">
	<div class="container">
		<h1 class="h4 section__title">
			We Need Some Information from your prior to checkout
		</h1>
	</div>
</div>

<div class="container">
	<div class="panel-group" id="accordion">
		<div class="panel panel--omega-top accordion-item accordion-active">
			<div class="panel__heading">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					<h2 class="h4 panel__title"><span>Step 1:</span> Your Membership</h2>
	        	</a>
			</div>
		    <div id="collapseOne" class="panel-collapse collapse in">
				<div class="panel__content">
					<div class="row">
						<div class="col-lg-6">
							<form class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
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
									<label for="" class="col-lg-4 col-sm-4 control-label text-blue">CSK $</label>
									<div class="col-lg-8 col-sm-8">
										<input type="text" class="form-control form-pretty" id="" placeholder="10" >
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
		    </div>
		
		</div>
		<div class="panel panel--omega-top panel--default accordion-item">
			<div class="panel__heading">
				<a data-toggle="collapse" data-parent="#accordion" href="#collpaseTwo">
					<h2 class="h4 panel__title"><span>Step 2:</span> More Details</h2>
	        	</a>
			</div>
		    <div id="collpaseTwo" class="panel-collapse collapse">
				<div class="panel__content">
					<div class="row">
						<div class="col-lg-6">
							<form class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
								<div class="form-group">
									<label for="" class="col-lg-4 col-sm-4 control-label">Name on Card</label>
									<div class="col-lg-8 col-sm-8">
										<input type="text" class="form-control form-pretty form-pretty--white" id="" >
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-lg-4 col-sm-4 control-label">Card Number</label>
									<div class="col-lg-8 col-sm-8">
										<input type="text" class="form-control form-pretty form-pretty--white" id="" >
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-lg-4 col-sm-4 control-label">Security Code</label>
									<div class="col-lg-8 col-sm-8">
										<input type="text" class="form-control form-pretty form-pretty--white" id=""  >
									</div>
								</div>
							</form>
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