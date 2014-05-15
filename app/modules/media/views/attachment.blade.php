<div class="row">
  <div class="media-attachment__info col-sm-5">
    <img src="{{ URL::to('/').'/'.$attachment['meta_data']['sizes']['post-thumbnail'] }}" alt="" class="media__thumbnail">
  </div>
  <div class="col-sm-7">
    <div class="formatted formatted--xlite">
      <h3 class="h4 media-attachment__title">{{ $attachment['post_title'] }}</h3>
      <span class="media-attachment__size mb-20px">{{ date('M d, Y', strtotime($attachment['post_date'])) }}</span>
      <!--<div class="media-attachment__action mb-30px">
        <a href="#" class="btn btn-default">
          <i class="fa fa-trash-o mr-5px"></i>
          <span>Delete</span>
        </a>
      </div>-->
    </div>
  </div>
</div>
  {{ Form::open(array('url' => 'admin/media/'. $attachment['id'].'/edit', 'id' => 'attachment-form', 'class' => 'mt-30px mb-15px form-horizontal form-horizontal--2nd', 'role' => 'form') ) }}
  {{ Form::hidden('id', $attachment['id'], array('id' => 'attachment_id')) }} 
  <div class="form-group">
    <div class="col-lg-4 col-md-5 col-sm-5"></div>
    <div class="col-lg-8 col-md-7 col-sm-7">
      <small>Details</small>
		<div class="pull-right">
			<span class="settings-save-status">
				<small class="spinner"></small>
				<small class="saved"><i class="fa fa-check mr-5px"></i>Saved.</small>
			</span>
		</div>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Title</label>
    <div class="col-lg-8 col-md-7 col-sm-7">
      {{ Form::text('post_title', $attachment['post_title'], array('class' => 'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Caption</label>
    <div class="col-lg-8 col-md-7 col-sm-7">
      
      {{ Form::textarea('post_excerpt', $attachment['post_excerpt'], array('class' => 'form-control', 'rows' => 1)) }}
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Alt Text</label>
    <div class="col-lg-8 col-md-7 col-sm-7">
	{{ Form::text('meta[attachment_image_alt]', $attachment['alt_text'],array('class' => 'form-control', 'rows' => 1))  }}
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Description</label>
    <div class="col-lg-8 col-md-7 col-sm-7">
      {{ Form::textarea('post_content', $attachment['post_content'], array('class' => 'form-control', 'rows' => 2)) }}
    </div>
  </div>
</form>

<div class="form-group">
  <div class="col-lg-4 col-md-5 col-sm-5"></div>
  <div class="col-lg-8 col-md-7 col-sm-7 btn-lg">
    @if(isset($attachment['action']) && $attachment['action'] == 'attach-to-editor')
      <button type="button" id="attach-to-editor" class="btn btn-primary btn-teal" aria-hidden="true" data-dismiss="modal">Attach to editor</button>
    @else
      <button type="button" id="attach-to-post" class="btn btn-primary btn-teal" aria-hidden="true" data-dismiss="modal">Attach to post</button>
    @endif
  </div>
</div>