@extends('layouts.back')

@section('content')

<div class="section section--top">
    <div class="pull-left mr-15px">
        <h1 class="h3 section__title">
            <i class="fa fa-bullhorn mr-5px"></i>
            <span>Tax Forms</span>
        </h1>
    </div>
    <div class="pull-right search">
        {{ Gy::getSearch() }}
    </div>
</div>
<form action="" method="get" class="list--con">
    <!-- Main Content -->
    {{ Gy::system_messages() }}
    <div class="section section--stroke">
        <div class="pull-right">
            <div class="selectpicker-sm">
                {{ $list->getPerPageLimit() }}
            </div>
        </div>

    </div>
    <div class="section section--box">
        {{ $list->getTableData() }}

        <div class="section section-l2">
            <div class="pull-left">
                <div class="table-results">
                    {{ $list->getPaginationInfo() }}
                </div>
            </div>
            <div class="pull-right">
                {{ $list->getPagination() }}
            </div>
        </div>
    </div>
@stop