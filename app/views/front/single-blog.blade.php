@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top">
    <div class="container">
        <div class="pull-left">
            <h1 class="h3 section__title pt-15px">
                Ace Articles
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="t-content col-lg-8 col-sm-12">
            
             <article class="post post--primary">
                <aside class="post__meta">
                    <div class="post__meta-date">
                       <span class="week">{{ date('Y', strtotime($blog['post_date'])) }}</span>
                            <span class="day">{{ date('d', strtotime($blog['post_date'])) }}</span>
                            <span class="month">{{ date('F', strtotime($blog['post_date'])) }}</span>           
                    </div>
                    <div class="post__meta-comment">
                        <span class="fa fa-comment"></span> {{ $blog['totalComments'] }}
                    </div>
                </aside>
                <div class="post__body">
                    <header class="post__title">
                        <h2 class="t1"><a href="">{{ $blog['post_title'] }}</a></h2>
                        <p class="meta-author">By: <a href="#"></a><a href="http://lithium.flexwebhosting.com.au/~gy/author/clairestudio912-com/" title="Posts by {{ $blog['firstname'].' '.$blog['lastname'] }}" rel="author">{{ $blog['firstname'].' '.$blog['lastname'] }}</a></p>
                    </header>

                    <div class="video-wrapper">
                        {{ $blog['post-media'] }}
                    </div>

                    <div class="formatted">
                      {{ $blog['post_content'] }}
                    </div>
                    <?php echo get_blog_edit_link($blog['post_id']) ?>
                    <div class="formatted">
                      <!-- AddThis Button BEGIN -->
                      <div class="addthis_toolbox addthis_default_style ">
                      <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:width="215" ></a>
                      <a class="addthis_button_tweet"></a>
                      <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
                      <a class="addthis_counter addthis_pill_style"></a>
                      </div>
                      <!-- AddThis Button END -->
                    </div>
                    <footer class="post__footer">
                        {{ Form::hidden('post_id',$blog['post_id'], array('id' => 'post_id')) }}
                        <div class="col-lg-12">
                        <div class="timeline-messages-listing">
                          <h3 class="timeline-title">Comments</h3>
                          <div class="timeline-messages"></div>
                        </div>
                        <!-- Timeline Messages -->
                          @if(Auth::check() && Auth::User()->group->hasRole('add_comment'))
                          <!--Timeline Messages -->                  
                          <div class="chat-form">
                            {{ Form::open(array('url' => 'post/comment')) }}
                            <div class="input-cont ">
                              {{ Form::textarea('comment', Input::get('comment'), array('cols' => '30', 'rows' => '4', 'class' => 'form-control form-pretty form-pretty--white col-lg-12','placeholder' => 'Type a message here...','id' => 'comment')) }}
                            </div>
                            <div class="form-group">
                              <div class="pull-right chat-features">
                                  <a href="javascript:;">
                                      <i class="icon-camera"></i>
                                  </a>
                                  <a href="javascript:;">
                                      <i class="icon-link"></i>
                                  </a>
                                  {{ Form::button('Send', array('class' => 'btn btn-blue btn-pretty btn-chat', 'id' => 'send-comment')) }}
                              </div>
                            </div>
                            {{ Form::close() }}
                          </div>
                          @endif
                      </div>
                    </footer>
                </div>
                </article>
        </div>
        <aside class="t-sidebar col-lg-4 col-sm-12">
            <div class="widget panel">
                <div class="panel__heading panel__heading--gray">
                    <h3 class="h4 panel__title">Recent <span class="text-blue">Arcticles</span></h3>
                </div>
                <div class="panel__content panel__content--offset block block--pretty">
                  @if(Auth::check())
                    @foreach(PostRecentlyViewed::getPostRecentlyViewed(Auth::User()->id, $blog['post_type']) as $item)
                    <div class="block__item">
                        <div class="block__img">
                             <img width="120" src="{{ $item['post-media'] }}" alt="">
                        </div>
                        <h3 class="h5 block__title block__title--2nd">{{ $item['post_title'] }}</h3>      
                        <a href="{{ URL::to($item['post_type'].'/'.$item['guid']) }}" class="btn btn-sm btn-light-blue--2nd">Read More</a>
                    </div>
                    @endforeach
                  @endif
                </div>
            </div>
        </aside>
    </div>
</div>
<script>
  $(function(){
    cskMain.Comment.init();
  });

</script>
@stop