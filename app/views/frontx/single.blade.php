@extends('layouts.front')
@section('content')

<div class="main-content">
  <div class="main-content-heading">
    <h1>{{ $page['post_title'] }}</h1>
  </div>
  <div class="row">
    {{ $page['post-media'] }}
    {{ the_content($page['post_content']) }}
  </div>
</div>
@stop