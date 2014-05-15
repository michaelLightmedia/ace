<?php include 'layouts/header.php'; ?>

<div class="section section--gray section--offset-top">
	<div class="container">
		<h1 class="h3 section__title">
			Checkout
		</h1>
	</div>
</div>

<div class="section section--checkout">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<ul class="progress-steps">
					<li>
						<a href="#">
							<i class="fa fa-shopping-cart mr-5px"></i>
							<span>1. Cart</span>
						</a>
					</li>
					<li class="active">
						<a href="#">
							<i class="fa fa-user mr-5px"></i>
							<span>2. Login Details</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-usd mr-5px"></i>
							<span>3. Payment</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-5">
				<div class="form-checkout--2-cols form-horizontal l-fields-horizontal" role="form">
					<h3 class="form-title">Welcome back. <span class="text-blue">Please login</span></h3>
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control form-control--huge" id="" placeholder="Username" autofocus>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="password" class="form-control form-control--huge" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<button class="btn btn-blue btn-md btn-fs--huge btn-block">
								Continue
								<i class="fa fa-chevron-circle-right ml-5px"></i>
							</button>
						</div>
						<div class="col-md-6 mt-18px">
							<a href="#"> Lost your password?</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-separator">
				<div class="fa-separator"></div>
				<div class="fa-icon-or">OR</div>
			</div>
			<div class="col-md-5 col-flow--right">
				<div class="form-checkout--2-cols form-horizontal l-fields-horizontal" role="form">
					<h3 class="form-title">Register to <span class="text-blue">Create an Account</span></h3>						
					<div class="mb-25px">
						<p><strong>Register and save time!</strong> Register with us for future convenience:</p>
						<p>Fast and easy check out Easy access to your order history and status</p>
					</div>
					<div class="row">
						<div class="col-md-6">
							<a href="checkout-signup.php" class="btn btn-blue btn-md btn-fs--huge btn-block">
								Sign up it's FREE!
							</a>	
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