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
			<li class="active">
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
					<h1 class="h2 t--huge">Your Loyalty Points</h1>
				</div>
			</div>
			<div class="panel__content panel__content--offset">
				<table class="table table-bordered table-hover table-pretty">
					<thead>
						<tr>
							<th>Balance B/F</th>
							<th>Earned</th>
							<th>Redeemed</th>
							<th>Referral</th>
							<th>Total Balance</th>
							<th>Expiry</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2000</td>
							<td>48</td>
							<td>4</td>
							<td>25</td>
							<td>1969</td>
							<td>20-10-2014</td>
						</tr>
						<tr>
							<td>2000</td>
							<td>48</td>
							<td>4</td>
							<td>25</td>
							<td>1969</td>
							<td>20-10-2014</td>
						</tr>
						<tr>
							<td>2000</td>
							<td>48</td>
							<td>4</td>
							<td>25</td>
							<td>1969</td>
							<td>20-10-2014</td>
						</tr>
						<tr>
							<td>2000</td>
							<td>48</td>
							<td>4</td>
							<td>25</td>
							<td>1969</td>
							<td>20-10-2014</td>
						</tr>
						<tr>
							<td>2000</td>
							<td>48</td>
							<td>4</td>
							<td>25</td>
							<td>1969</td>
							<td>20-10-2014</td>
						</tr>
						<tr>
							<td>2000</td>
							<td>48</td>
							<td>4</td>
							<td>25</td>
							<td>1969</td>
							<td>20-10-2014</td>
						</tr>
					</tbody>
				</table>
				<div class="panel__links">
					<a href="#" class="btn btn-md btn-blue btn-pretty">
						<strong>How to Earn ClearSK Points</strong>
					</a>
					<a href="#" class="btn btn-md btn-blue btn-pretty">
						<strong>How to redeem ClearSK Points</strong>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'layouts/register.php'; ?>
<?php include 'layouts/login-lightbox.php'; ?>
<?php include 'layouts/footer.php'; ?>