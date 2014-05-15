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
			<div class="mt-40px">
				<div class="col-md-7">
					<div class="form-horizontal l-fields-horizontal" role="form">
						<h3 class="form-title form-title--omega">Membership Details</h3>
						<p class="form-desc">Please provide the required fields below. </p>
						<div class="form-group">
							<div class="col-md-3">
								<label for="" class="control-label">Username *</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control form-control--huge" id="" placeholder="Username" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="" class="control-label">Password *</label>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-6">
										<input type="password" class="form-control form-control--huge" placeholder="Password">
									</div>
									<div class="col-md-6">
										<input type="password" class="form-control form-control--huge" placeholder="Confirm Password">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="" class="control-label">Full Name *</label>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="form-control form-control--huge" placeholder="First Name">
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control form-control--huge" placeholder="Last Name">
									</div>
								</div>
							</div>
						</div>
						<hr>
						<h3 class="form-title form-title--omega">Contact Details</h3>
						<p class="form-desc">Ways to contact you. </p>
						<div class="form-group">
							<div class="col-md-3">
								<label for="" class="control-label">Email *</label>
							</div>
							<div class="col-md-9">
								<input type="email" class="form-control form-control--huge" id="" placeholder="example@domain.com">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="" class="control-label">Mobile *</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control form-control--huge" id="" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label for="" class="control-label">Address 1 *</label>
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control form-control--huge" id="" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-10">
								<div class="checkbox">
									<label>
										<input type="checkbox"> I agree to ClearSK <a href="#">terms and conditions</a>.
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<button class="btn btn-blue btn-md btn-fs--huge btn-block">
									Register and Continue!
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<h3 class="form-title form-title--omega">Your Checkout Progress</h3>
					<p class="form-desc form-desc--pretty">Customer Information</p>
					<ul class="list-group">
						<li class="list-group-item list-group-item--pretty"><i class="fa fa-user mr-5px"></i>Gabriel Angeles</li>
						<li class="list-group-item list-group-item--pretty"><i class="fa fa-envelope-o mr-5px"></i>gabriel@gabriel.com</li>
						<li class="list-group-item list-group-item--pretty"><i class="fa fa-map-marker mr-5px"></i>Mandaue</li>
						<li class="list-group-item list-group-item--pretty"><i class="fa fa-map-marker mr-5px"></i>Cebui, 32343</li>
						<li class="list-group-item list-group-item--pretty"><i class="fa fa-location-arrow mr-5px"></i>New Zealand</li>
					</ul>

					<p class="form-desc form-desc--pretty">Order Summary</p>
					<div class="product-item-views">
						You have <span class="order__views">2</span> item in your cart
					</div>
					<div class="panel panel--gray panel--rounded">
						<div class="panel__content">
							

							<table class="table table--cart">
								<thead>
									<tr>
										<th>Product</th>
										<th style="width: 80px;">Quantity</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="product-desc">Lorem ipsum dolor sit amet.</td>
										<td>
											<input type="number" class="form-control" value="3" size="1">
										</td>
										<td>50.00</td>
									</tr>
									<tr>
										<td class="product-desc">Lorem ipsum dolor sit amet.</td>
										<td>
											<input type="number" class="form-control" value="10" size="1">
										</td>
										<td>50.00</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="clearfix mt-15px pb-10px stroke-bottom">
						<div class="pull-left">
							Subtotal
						</div>
						<div class="pull-right">
							$100.00
						</div>
					</div>
					<div class="clearfix mt-10px pb-10px stroke-bottom">
						<div class="pull-left">
							Max Redeemable Points
						</div>
						<div class="pull-right">
							$100.00
						</div>
					</div>
					<div class="clearfix mt-10px pb-5px">
						<div class="pull-left">
							<strong>Total</strong>
						</div>
						<div class="pull-right">
							<strong>$100.00</strong>
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