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
			<li class="active">
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
					<h1 class="h2 t--huge">Your Orders</h1>
				</div>
			</div>
			<div class="panel__content panel__content--offset">
				<table class="table table-bordered table-hover table-pretty">
					<thead>
						<tr>
							<th>Date</th>
							<th style="width: 45%">Item</th>
							<th>Amount</th>
							<th>Purchase in store by</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>10-03-13</td>
							<td>Skin White</td>
							<td>$10</td>
							<td>10-03-13</td>
						</tr>
						<tr>
							<td>10-03-13</td>
							<td>Skin White</td>
							<td>$10</td>
							<td>10-03-13</td>
						</tr>
						<tr>
							<td>10-03-13</td>
							<td>Skin White</td>
							<td>$10</td>
							<td>10-03-13</td>
						</tr>
						<tr>
							<td>10-03-13</td>
							<td>Skin White</td>
							<td>$10</td>
							<td>10-03-13</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'layouts/register.php'; ?>
<?php include 'layouts/login-lightbox.php'; ?>
<?php include 'layouts/footer.php'; ?>