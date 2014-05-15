@extends('layouts.front')
@section('content')

<div class="banner banner-page">
    <div class="container">
        <h1 class="banner-title">{{ $page['post_title'] }}</h1>
    </div>
</div>
<div class="container main-content">
    <div class="row">
        <div class="col-sm-12 t-content">
            {{ $page['post-media'] }}
            {{ post_decode($page['post_content']) }}
        </div>
    </div>
</div>


@stop