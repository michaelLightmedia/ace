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
				<a href="ask-an-expert.php" class="btn is-active btn-light-blue btn-pretty btn-pretty--2nd">
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
				<div class="col-lg-8">
					<h2 class="h3 panel__sub-heading-title">I have a Question</h2>
				</div>
				<div class="col-lg-4">
					<div class="row">
						<div class="col-lg-3">
							<h2 class="h3 panel__sub-heading-title panel__sub-heading-title--tiny">Subject</h2>
						</div>
						<div class="col-lg-9">
							<div class="selectpicker-full selectpicker-rounded">
								<select class="selectpicker selectpicker--no-result">
									<option>Skin - Face</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Successfully Saved!
			      </div>
			</div>
		</div>
		<div class="panel__content">
			<div class="row">
				<div class="col-lg-8">
					<div class="panel">
						<textarea class="ckeditor form-control" name="editor1" placeholder="Enter text ..." style="width: 100%; height: 350px"></textarea>
					</div>
					<div class="pull-right">
						<span class="message-submit mr-15px">
							Sending Question 
							<i class="fa fa-spinner fa-spin ml-5px"></i>
						</span>
						<button class="btn btn-message-submit btn-blue">
							<i class="fa fa-question-circle mr-5px"></i>
							Submit
						</button>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="panel panel--rounded">
						<div class="panel__heading">
							<h3 class="h5 panel__title text-blue">Upload Photo</h3>
						</div>
						<div class="panel__content block">
							<div class="block__item">
								<div class="alert alert-sm alert-info">
									<span class="alert-link">Accepted Files: .jpg,.gif</span>
								</div>
							</div>
							<div class="block-listing">
								<div class="block__item">
									<span class="mt-7px btn btn-light-blue btn-sm btn-pretty fileinput-button">
				                        <strong>CHOOSE FILE</strong>
				                        <input type="file" name="files[]" multiple="">
				                    </span>
								</div>
								<div class="block__item">
									<span class="mt-7px btn btn-light-blue btn-sm btn-pretty fileinput-button">
				                        <strong>CHOOSE FILE</strong>
				                        <input type="file" name="files[]" multiple="">
				                    </span>
								</div>
								<div class="block__item">
									<span class="mt-7px btn btn-light-blue btn-sm btn-pretty fileinput-button">
				                        <strong>CHOOSE FILE</strong>
				                        <input type="file" name="files[]" multiple="">
				                    </span>
								</div>
								<div class="block__item">
									<span class="mt-7px btn btn-light-blue btn-sm btn-pretty fileinput-button">
				                        <strong>CHOOSE FILE</strong>
				                        <input type="file" name="files[]" multiple="">
				                    </span>
								</div>
								<div class="block__item">
									<span class="mt-7px btn btn-light-blue btn-sm btn-pretty fileinput-button">
				                        <strong>CHOOSE FILE</strong>
				                        <input type="file" name="files[]" multiple="">
				                    </span>
								</div>
								<div class="block__item">
									<span class="mt-7px btn btn-light-blue btn-sm btn-pretty fileinput-button">
				                        <strong>CHOOSE FILE</strong>
				                        <input type="file" name="files[]" multiple="">
				                    </span>
								</div>
							</div>
							<div class="block__item block__item--omega-top">
								<button class="btn btn-block btn-gray btn-pretty">
									<i class="fa fa-plus mr-5px"></i>
									<strong>ADD OTHER PHOTO</strong>
								</button>
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