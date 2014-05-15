<?php include 'header.php' ?>

<div class="page-heading">
  <div class="container">
    <h1>Payment</h1>
  </div>
</div>
<div class="container">
<div class="section section-l5 section-col2">
	<div class="row ">
		<div class="col-md-6 col-item">

			<div class="col-md-10 pull-left">
				<div class="form-group">
					<label for="" class="label-lg label-control">Tax Return for tax year</label>
					<select name="" id="" class="select2 select-lg form-control ">
						<option value="">2013</option>
						<option value="">2014</option>
						<option value="">2015</option>
						<option value="">2016</option>
						<option value="">2017</option>
					</select>
				</div>
			</div>

		</div>
		<div class="col-md-6 col-item">

			<div class="col-md-10 pull-right">
				<label for="" class="label-lg label-control ">Services</label>
				<ul class="list-stacked list-check">
					<li>Review by tax Accountant</li>
					<li>Process by tax Agent (Submission to ATO)</li>
				</ul>
			</div>

		</div>
	</div>
</div>
<div class="section section-l5">	
	<div class="payment-options">
		<div class="payment-price"><h1>$19.99</h1><span class="'">Cost</span></div>
		<div class="payment-tagline"><h4>Choose a secure payment method</h4></div>
		<div class="row">
		    <div class="col-md-10 col-md-offset-1">
		    	<div class="form-group">
					<div class="col-md-4">
						<div class="radio">
							<label class="checkbox-inline">
							  <input type="radio" id="inlineCheckbox1" name="payment" value="$00.00">
							  <div class="checkbox-img"><img src="placeholders/refund.png" alt=""></div>
							  <p>Fee from refund</p>
							</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="radio">
							<label class="checkbox-inline">
							  <input type="radio" id="inlineCheckbox1" name="payment" value="$00.00" checked>
							  <div class="checkbox-img"><img src="placeholders/paypal.png" alt=""></div>
							  <p>Pay with PayPal</p>
							</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="radio">
							<label class="checkbox-inline">
							  <input type="radio" id="inlineCheckbox1" name="payment" value="$00.00">
							  <div class="checkbox-img"><img src="placeholders/credit.png" alt=""></div>
							  <p>Pay with a credit card</p>
							</label>
						</div>
					</div>
				</div>
		    </div>
		</div>
	</div>
</div>

<div class="section section-l5">

	<ul class="list-inline tab-control">
	  <li class="active"><a href="#bill" data-toggle="tab">Billing and Credit Card Details</a></li>
	  <li><a href="#bank" data-toggle="tab">Bank Details</a></li>
	</ul>

	<div class="tab-content">
	  <div class="tab-pane active" id="bill">

	  	 <div class="section-footer">
	        <button class="btn btn-teal btn-lg">Submit and Return <span class="fa fa-arrow-right"></span></button>
	    </div>

	  </div>
	  <div class="tab-pane" id="bank">bank</div>
	</div>
</div>
</div>

<?php include 'footer.php' ?>