@extends('layouts.back')


@section('section-top')
    <h1 class="page-title">
        <span>Dashboard</span>
    </h1>
@stop

@section('content')

    <div class="section section--top section--intro">
        <h1>Welcome to Dashboard</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <div class="section section--stroke">
        <h2 class="h4 section__title">Quick Start</h2>
        <div class="row">
            <div class="col-md-6">
                        
                <div class="section--buttons">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Manage Pages</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Manage Projects</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Manage Posts</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Manage Users</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Manage Navigations</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Manage Sliders</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Settings</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-default btn-md btn-block">
                                <span>Add Testimonials</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    
            </div>
        </div>
@stop