@extends('user::customer.profile')

@section('sub-content')
<!-- / Listings -->
<div class="panel">
  {{ Form::open(array('files' => true)) }}
  <div class="panel__heading panel__heading--huge">
    <div class="pull-left">
      <h1 class="h2 t--huge">Membership Details</h1>
    </div>
  </div>
  <div class="panel__content panel__content--pretty">
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
          <div class="form-group">
            {{ Form::label('username', 'Username', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::text('username', $user['username'], array('class' => 'form-control form-pretty')) }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('password', 'Password', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::password('password', array('class' => 'form-control form-pretty')) }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('password2', 'Confirm Password', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::password('password2', array('class' => 'form-control form-pretty')) }}
            </div>
          </div>
          <br>
          <div class="form-group">
            {{ Form::label('firstname', 'First Name', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::text('firstname', $user['firstname'], array('class' => 'form-control form-pretty')) }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('lastname', 'Last Name', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::text('lastname', $user['lastname'], array('class' => 'form-control form-pretty')) }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('nric', 'NRIC', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::text('nric', $user['nric'], array('class' => 'form-control form-pretty')) }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('gender', 'Gender', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::select('gender', array('M' => 'Male', 'F' => 'Female'), $user['gender'],array('class' => 'selectpicker')) }}
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('birthdate', 'Birthdate', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              <div class="date datepicker" id="datepicker">
                <div class="add-on">
                  {{ Form::text('birthdate', date('m/d/Y', strtotime($user['birthdate'])), array('class' => 'form-control form-pretty form-pretty--white')) }}
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
                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Your Membership Details"></i>
              </label>
            <div class="col-lg-8 col-sm-8">
              {{ Form::text('membership', 'Silver', array('class' => 'form-control form-pretty', 'disabled' => 'disabled')) }}
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('created_at', 'Date Joined', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::text('created_at', $user['created_at'], array('class' => 'form-control form-pretty', 'disabled' => 'disabled')) }}
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('points', 'CSK $', array('class' => 'col-lg-4 col-sm-4 control-label text-blue text-underline')) }}
            <div class="col-lg-8 col-sm-8">
              {{ Form::text('points', $user['points'], array('class' => 'form-control form-pretty', 'disabled' => 'disabled')) }}
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-4 col-lg-offset-1 col-md-5">
      <div class="row">
        <div class="block--gray">
          <div class="gravatar-pretty">
            @if( !isset($user['id']) )
              <img src="{{ URL::to(UserHelper::defaultAvatar('75x75')) }}" />
            @else
              <img src="{{ URL::to( UserHelper::avatar( $user['id'], '87x87' ) ) }}" />
            @endif

            <label for="" class="upload-container btn btn-primary">
              <input type="file" name="avatar" accept="image/*" class="">
            </label>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="panel__footer">
    <div class="pull-right">
      {{ Form::button('<strong>EDIT / SAVE</strong>', array('type' => 'submit', 'class' => 'btn btn-lg btn-blue btn-pretty')) }}
    </div>
  </div>
  {{ Form::close() }}
</div>
@stop