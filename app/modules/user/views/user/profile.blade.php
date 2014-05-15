@extends('layouts.back')

@section('section-top')
	<!-- Main Content -->
	<div class="section section--top">
		<div class="pull-left mr-15px">
			<h1 class="h3 section__title">
				<i class="fa fa-user-md mr-5px"></i>
				<span>Profile</span>
			</h1>
		</div>
	</div>
@stop
@section('content')
	{{ Site::system_messages() }}
	{{ Form::open(array('url' => 'admin/profile', 'files' => true)) }}
		<div class="section">
			<div class="row">
				<div class="col-lg-2 col-md-3">
					<div class="list-group list-group--2nd">
						<a href="settings-profile.php" class="list-group-item active">
							<i class="fa fa-user mr-5px"></i>
							Your Profile
						</a>								
					</div>
				</div>
				<div class="col-lg-10 col-md-9">
					<div class="panel">
						<div class="panel__heading">
							<h1 class="h4">Profile</h1>
						</div>
						<div class="panel__content">
							<div class="row">
								<div class="col-lg-7 col-sm-8">
									<div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
										<div class="form-group">
											{{ Form::label('firstname', 'First Name', array('class' => 'col-lg-4 col-md-5 col-sm-5 control-label')) }}
											<div class="col-lg-8 col-md-7 col-sm-7">
												{{ Form::text('firstname', $user['firstname'], array('class' => 'form-control', 'autofocus' => 'autofocus')) }}
											</div>
										</div>
										<div class="form-group">
											{{ Form::label('lastname', 'Last Name', array('class' => 'col-lg-4 col-md-5 col-sm-5 control-label')) }}
											<div class="col-lg-8 col-md-7 col-sm-7">
												{{ Form::text('lastname', $user['lastname'], array('class' => 'form-control')) }}
											</div>
										</div>
										<div class="form-group">
											{{ Form::label('role', 'Role', array('class' => 'col-lg-4 col-md-5 col-sm-5 control-label')) }}
											<div class="col-lg-8 col-md-7 col-sm-7">
												<div class="selectpicker-full">
													{{ Form::text('role', Auth::User()->group->group, array('class' => 'form-control', 'disabled', 'disabled')) }}
												</div>
											</div>
										</div>
										<div class="form-group">
											{{ Form::label('email', 'Email', array('class' => 'col-lg-4 col-md-5 col-sm-5 control-label')) }}
											<div class="col-lg-8 col-md-7 col-sm-7">
												{{ Form::text('email', $user['email'], array('class' => 'form-control')) }}
											</div>
										</div>
										<div class="form-group">
											{{ Form::label('password', 'Password', array('class' => 'col-lg-4 col-md-5 col-sm-5 control-label')) }}
											<div class="col-lg-8 col-md-7 col-sm-7">
												{{ Form::text('password',false,array('class' => 'form-control')) }}
											</div>
										</div>
										<div class="form-group">
											{{ Form::label('password2', 'Confirm New Password', array('class' => 'col-lg-4 col-md-5 col-sm-5 control-label')) }}
											<div class="col-lg-8 col-md-7 col-sm-7">
												{{ Form::text('password2',false, array('class' => 'form-control')) }}
											</div>
										</div>
									</div>
								</div>

								<!-- / Settings Form -->
								<div class="col-lg-5 col-sm-4">
									<div class="block--gray">
										<div class="gravatar-pretty">
								            {{ HTML::image( UserHelper::avatar(false, '87x87') ) }}
								            
								            <label for="" class="upload-container btn btn-primary">
								             {{ Form::file('avatar', array('accept' => 'image/*')) }}
								            </label>
								          </div>
									</div>
								</div>

								<div class="col-lg-5">
									{{ Form::button('<i class="fa fa-edit"></i><span>Update</span>', array('type' => 'submit', 'class' => 'btn btn-default mt-15px')) }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
@stop