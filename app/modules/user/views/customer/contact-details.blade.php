@extends('user::customer.profile')

@section('sub-content')
<!-- / Listings -->
<div class="panel">
  {{ Form::open() }}
  <div class="panel__heading panel__heading--huge">
    <div class="pull-left">
      <h1 class="h2 t--huge">Contact Details</h1>
    </div>
  </div>
  <div class="panel__content panel__content--pretty">
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
        <div class="form-group">
          {{ Form::label('email', 'Email', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
         <div class="col-lg-8 col-sm-8">
            {{ Form::text('email', (isset($user['email'])) ? $user['email'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('mobile', 'Phone/Mobile', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
          <div class="col-lg-8 col-sm-8">
            {{ Form::text('mobile', (isset($user['mobile'])) ? $user['mobile'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('address_1', 'Address 1', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
          <div class="col-lg-8 col-sm-8">
            {{ Form::text('address_1', (isset($user['address_1'])) ? $user['address_1'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('address_2', 'Address 2', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
          <div class="col-lg-8 col-sm-8">
            {{ Form::text('address_2', (isset($user['address_2'])) ? $user['address_2'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('state', 'State', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
          <div class="col-lg-8 col-sm-8">
            {{ Form::text('state', (isset($user['state'])) ? $user['state'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('postcode', 'Postcode', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
          <div class="col-lg-8 col-sm-8">
            {{ Form::text('postcode', (isset($user['postcode'])) ? $user['postcode'] : false , array('class' => 'form-control form-pretty form-pretty--white')) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('country', 'Country', array('class' => 'col-lg-4 col-sm-4 control-label')) }}
          <div class="col-lg-8 col-sm-8">
            <div class="selectpicker-full">
                {{ Form::select('country', UserHelper::countries(), $user['country'], array('class' => 'selectpicker selectpicker--country')) }} 
            </div>
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