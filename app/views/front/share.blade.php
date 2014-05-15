@if(Auth::User()->group->hasRole('share_post'))
  {{ Form::open(array('url' => 'share', 'id' => 'share-form')) }}
  {{ Form::hidden('post_id',$post['id'], array('id' => 'post_id')) }}
  {{ Form::hidden('url', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ) }}

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h2 class="h3 modal-title" id="myModalLabel"><i class="fa fa-share-square-o mr-10px"></i>Share</h2>
  </div>
  <div class="modal-body">
    <div class="mt-15px mb-15px form-horizontal l-fields-horizontal" role="form">
      <div class="form-group">
        <div class="col-sm-12">
          <h4 class="h5">Type email and hit "ENTER"</h4>
        </div>
      </div>
       <div class="form-group">
        <div class="col-sm-12">
          {{ Form::text('email', 'john.doe@domain.com', array('class' => 'form-control form-pretty form-pretty--lg form-pretty--white')) }}
        </div>
      </div>
       <div class="form-group">
        <div class="col-sm-12">
          {{ Form::textarea('message', Input::get('message'), array('cols' => '30', 'rows' => '6', 'class' => 'form-control form-pretty form-pretty--lg form-pretty--white', 'placeholder' => 'Your Personallised Message (can leave blank)')) }}
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
     <div class="msg-wrapper pull-left"></div>
    {{ Form::button('<strong>Send</strong>', array('type' => 'submit', 'class' => 'btn btn-light-blue--2nd btn-md btn-pretty btn-md--2nd')) }}
  </div>
  {{ Form::close() }}

  <script>
    $(function(){
      gy.User.share();
    });
  </script>
@else
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h2 class="h3 modal-title" id="myModalLabel"><i class="fa fa-share-square-o mr-10px"></i>Share</h2>
  </div>
  <div class="modal-body">Your are not authorize to share.</div>
  <div class="modal-footer"></div>
@endif