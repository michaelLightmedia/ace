<?php include 'layouts/header.php'; ?>

<div class="section section--gray section--offset-top section--offset-bottom-lg">
	<div class="container">
		<h1 class="h3 section__title">
			Ask an Expert
		</h1>
	</div>
</div>

<div class="container">
	<div class="panel panel--omega-top panel--blue">
		<div class="panel__heading">
			<div class="pull-left">
				<a href="ask-an-expert.php" class="btn btn-light-blue btn-pretty btn-pretty--2nd">
					Ask a Question
				</a>
				<a href="ask-an-expert-inbox.php" class="btn btn-light-blue btn-pretty btn-pretty--2nd">
					My Inbox <span class="badge js-badge">3</span>
				</a>
			</div>
			<div class="pull-right search--2nd">
				<form class="form-inline form-rounded" role="form">
					<div class="form-group">
						<i class="fa fa-search"></i>
						<input type="search" class="form-control" placeholder="Search..">
					</div>
				</form>
			</div>
		</div>
		<div class="panel__sub-heading">
			<div class="row">
				<div class="col-lg-5 col-sm-5">
					<h2 class="h4 panel__sub-heading-title">Questions</h2>
				</div>
				<div class="col-lg-5 col-sm-5">
					<h2 class="h4 panel__sub-heading-title">Answer</h2>
				</div>
				<div class="col-lg-2 col-sm-2">
					<h2 class="h4 panel__sub-heading-title">Recommendation</h2>
				</div>
			</div>
		</div>
		<div class="panel__content block--spread">
			<div class="row">
				<div class="cols col-lg-5 col-sm-5">
					<div class="block__item">
						<h2 class="h4 block__title text-blue">Skin - Face</h2>
						<div class="block__content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, nam, vel, numquam dolorem deleniti alias iure explicabo optio temporibus at a molestias accusantium id veritatis beatae doloribus ...
						</div>
					</div>
				</div>
				<div class="cols col-lg-5 col-sm-5">
					<div class="block__item">
						<h2 class="h4 block__title text-blue">Skin - Face</h2>
						<div class="block__content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, nam, vel, numquam dolorem deleniti alias iure explicabo optio temporibus at a molestias accusantium id veritatis beatae doloribus ...
						</div>
					</div>
				</div>
				<div class="cols col-lg-2 col-sm-2">
					<div class="block__item">
						<div class="block__content">
							<a href="#" class="btn btn-default">Read More <i class="fa fa-long-arrow-right"></i></a>
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