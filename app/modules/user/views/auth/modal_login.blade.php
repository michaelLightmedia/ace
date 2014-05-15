<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
{{ Form::open(array('url' => 'login', 'id' => 'loginForm')) }}
<div class="modal-body"> 
  <h4 class="modal-title" id="myModalLabel">Login to ClearsSk</h4>
  <div class="form-group-horizontal-merge">
    <div class="form-group">
      <label for="username" class="control-label"><span class="fa fa-user"></span></label>
      {{ Form::text('username', Input::get('username'), array('class' => 'form-control validate[required]', 'placeholder' => 'john', 'autofocus')) }}
    </div>
    <div class="form-group">
      <label for="password" class="control-label"><span class="fa fa-lock"></span></label>
      {{ Form::password('password', array('class' => 'form-control  validate[required]', 'placeholder' => 'Password')) }}           
    </div>
  </div>

  <div class="form-group">
    <div class="row">
      <div class="col-sm-6">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('remember', 1) }} Remember me
          </label>
        </div>
      </div>
      <div class="col-sm-6">
        <a href="{{ URL::to('user/request') }}" class="pull-right">forgot Password?</a>
      </div>
    </div>
  </div>
  <div class="msg-wrapper"></div>
  {{ Form::button('Sign In', array('type' => 'submit', 'class' => 'btn btn-block btn-lg btn-primary')) }}

</div>
<script>
  (function(){
    'use strict';
    $(function(){
      gy.User.login();
    });
  })(jQuery);
</script>
{{ Form::close() }}