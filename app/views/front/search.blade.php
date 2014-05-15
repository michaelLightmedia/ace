@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top">
    <div class="container">
        <div class="pull-left">
            <h1 class="h3 section__title pt-15px">
                Search Results
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="t-content col-lg-8 col-sm-12">
            @if( count($results) != 0 )
              @foreach( $results as $result )
               <article class="post post--primary">
                  <div class="post__body">
                      <header class="post__title">
                        <strong><a href="">{{ preg_replace("/($key)/i", '<span class="label label-success">'.Input::get('s').'</span>', strip_tags($result->post_title))  }}</a></strong>
                      </header>
                      <div class="formatted">

                        @if( strlen(strip_tags( $result->post_content )) > 300 )

                          {{ preg_replace("/($key)/i", '<span class="label label-success">'.Input::get('s').'</span>', substr( strip_tags($result->post_content), 0, 297 )).'...' }} 
                        @else 

                          {{ preg_replace("/($key)/i", '<span class="label label-success">'.Input::get('s').'</span>', strip_tags($result->post_content))  }}
                        @endif
                      </div>
                      @if( $result->post_type == 'blog' )
                        <a href="/{{ $result->guid }}">Read more</a>
                      @else
                        <a href="/{{ $result->post_type.'/'.$result->guid }}">Read more</a>
                      @endif
                </article>

              @endforeach
            
              {{ Site::productPagination($totalItems) }}
            @else
              <strong>Sorry, No results found!</strong>
            @endif
        </div>
    </div>
</div>
@stop