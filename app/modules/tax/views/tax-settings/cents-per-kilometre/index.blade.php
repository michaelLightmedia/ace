@extends('tax::tax-settings._sidebar')

@section('sub-content')
<form action="" method="get" class="list--con">
    
    <div class="section section-l2">
        <div class="pull-left">
            <h1 class="h4 section-title">Cents Per Kilometre</h1>

            <a class="btn btn-blue btn-uc btn-sm-2nd mt-5px" href="{{ URL::to("/admin/tax-form/settings/cents-per-kilometre/create") }}">
                <i class="fa fa-plus mr-5px"></i>
                <span>Add New</span>
            </a>
        </div>

        <div class="pull-right">
            {{ $list->getPerPageLimit() }}
        </div>
    </div>


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
{{ Form::close() }}
@stop