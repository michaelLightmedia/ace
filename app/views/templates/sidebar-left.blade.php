@extends('layouts.front')
@section('content')
<div class="section section--gray section--offset-top">
  <div class="container">
    <div class="pull-left">
      <h1 class="h3 section__title pt-15px">
        {{ $page['post_title'] }}
      </h1>
      <p>{{ $page['post_excerpt'] }}</p>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
        {{ $page['post-media'] }}
        {{ $page['post_content'] }}
    </div>
  </div>
</div>

@stop