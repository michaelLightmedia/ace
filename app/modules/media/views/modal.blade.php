<!-- Modal -->
  <div class="modal-dialog media-uploader">
    <div class="modal-content">
      <div class="row">
        <div class="col-lg-2 media-nav">
          <ul id="mediaMenu" class="nav nav-tabs nav-tabs--block">
            <li class="active"><a class="media-library" href="#upload-media" data-toggle="tab">Media Library</a></li>
            <!-- show file uploader if current user is administrator -->
            <?php if( Auth::User()->group->hasRole('upload_media') ):?>
            <li class=""><a href="#insert-url" data-toggle="tab">Insert from Url</a></li>
            <li class=""><a class="upload-files" href="#upload-files" data-toggle="tab">Upload Files</a></li>
            <?php endif;?>
          </ul>
        </div>


        <div id="mediaAttachmentTab" class="col-lg-10 media-tab tab-content">
          <div class="tab-pane tab-pane--stroke fade active in" id="upload-media">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<div class="pull-left mr-15px">
        					<h1 class="h3 section__title">
        						<i class="fa fa-upload mr-5px"></i>
        						<span>Media Library</span>
        					</h1>
        				</div>
        				<div class="pull-left load-more">
        				  <div class="form-inline form-rounded" role="form">
        					  <div class="form-group">
        						  {{ Form::button('<i class="fa fa-plus mr-5px"></i>Load more', array('class' => 'btn btn-info btn-uc btn-sm-2nd', 'id' => 'load-more-media' )) }}
        					  </div>
        				  </div>
        				</div>
            </div>
            <div class="modal-body modal-body--2nd">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 media-listings">
                  <div class="block--white">
                    <div class="pull-right search">
                      <div class="form-inline form-rounded" role="form">
                          <div class="form-group">
                              <i class="fa fa-search"></i>
                {{ Form::text('smedia', '',array('id' => 'search-media', 'class' => 'form-control', 'placeholder' => 'Search' ) ) }}
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="media-listings__inner">
                    <ul class="media-attachments"></ul>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 media-attachment-details">
                  
                </div>
              </div>
            </div>
          </div>
          <!-- / Tab -->
          <!-- show file uploader if current user is administrator -->
           <?php if( Auth::User()->group->hasRole('upload_media') ):?>
          <div id="upload-files" class="tab-pane tab-pane--stroke fade">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="media">Upload Files</h4>
            </div>
            <div class="modal-body embed-settings">
              <div class="row">
                <div class="col-lg-12" id="file-upload-box">
                  @include('media::uploader')
                </div>
              </div>
            </div>
          </div>
          <!-- / Tab -->
          <div id="insert-url" class="tab-pane tab-pane--stroke fade">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="media">Insert from Url</h4>
              {{ Form::text('attachment_url', 'http://', array('id' => 'attachment_url', 'class' => 'form-control embed-url')) }}
            </div>
            <div class="modal-body embed-settings">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    {{ Form::label('attachment_title', 'Title') }}
                    {{ Form::text('attachment_title', false, array('id' => 'attachment_title', 'class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::button('Attach Media', array('id' => 'url-attach-to-post', 'class' => 'btn btn-primary btn-teal' )) }}
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- / Tab -->
          <?php endif; ?>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
