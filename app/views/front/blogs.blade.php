@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top">
    <div class="container">
        <div class="pull-left">
            <h1 class="h3 section__title pt-15px">
                Site Articles
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="t-content col-lg-8 col-sm-12">
            <div class="article-list">
                @if ($blogs)
                @foreach($blogs as $blog)
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

                        <div class="post__body">
                            <header class="post__title">
                                <h2 class="t1"><a href="">{{ $blog['post_title'] }}</a></h2>
                                <p class="meta-author">By: <a href="#"></a><a href="#" title="Posts by {{ $blog['firstname'].' '.$blog['lastname'] }}" rel="author">{{ $blog['firstname'].' '.$blog['lastname'] }}</a></p>
                            </header>

                            <div class="video-wrapper">
                                {{ $blog['post-media'] }}
                            </div>

                            <div class="formatted">
                                <p> {{ $blog['excerpt'] }}</p>

                                <a href="{{ URL::to('blog/'.$blog['guid']) }}" class="btn btn-light-blue--2nd">Full Article <span class="fa fa-long-arrow-right"></span></a>
                                <?php echo get_blog_edit_link($blog['post_id']) ?>
                            </div>

                            <div class="post__footer">
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style" addthis:url="{{ URL::to('blog/'.$blog['guid']) }}">
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count" fb:like:width="215" ></a>
                                    <a class="addthis_button_tweet"></a>
                                    <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>
                                <!-- AddThis Button END -->
                            </div>
                        </div>
                </article>
                @endforeach

                @else
                <p> No available post yet. <?php echo get_blog_add_link() ?></p>
                @endif
                <?php Site::productPagination($totalItems)  ?>
            </div>
        </div>
        <aside class="t-sidebar col-lg-4 col-sm-12">
            <div class="widget panel">
                <div class="panel__heading panel__heading--gray">
                    <h3 class="h4 panel__title">Recent <span class="text-blue">Arcticles</span></h3>
                </div>
                @if(Auth::check())
                <div class="panel__content panel__content--offset block block--pretty">
                    @foreach(PostRecentlyViewed::getPostRecentlyViewed(Auth::User()->id, $post_type) as $item)
                    <div class="block__item">
                        <div class="block__img">
                            <img width="120" src="{{ $item['post-media'] }}" alt="">
                        </div>
                        <h3 class="h5 block__title block__title--2nd">{{ $item['post_title'] }}</h3>
                        <a href="{{ URL::to($item['post_type'].'/'.$item['guid']) }}" class="btn btn-sm btn-light-blue--2nd">Read More</a>
                    </div>
                    @endforeach
                    <!-- <div class="block__item">
                        <a href="#" class="btn btn-blue btn-block btn-pretty"><strong>View All Article</strong></a>
                    </div> -->
                </div>
                @endif
            </div>
        </aside>
    </div>
</div>
@stop