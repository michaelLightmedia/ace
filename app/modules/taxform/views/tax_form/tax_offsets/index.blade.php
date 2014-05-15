@extends('layouts.tax_form')

@section('content')

<div class="banner banner-process">
    <span class="itp-rocket"></span>
    <span class="itp-satellite"></span>

</div>

<div class="container-fluid container-l2">

    <div class="t-content">

        @include('taxform::tax_form._process_steps')

        <div class="section section-l7">
                {{ Gy::system_messages() }}

            <header class="heading heading-l2 l2-2">
                <h1>Tax of Offsets and Other Items</h1>
            </header>

            <form id="tax_offsets_form" class="are_you_sure" method="POST" action="{{ url("/tax-form/tax-offsets") }}" autocomplete="off" novalidate="novalidate">

                <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="next_process_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/summary') }}">
                <input type="hidden" name="success_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/tax-offsets#private-health-insurance') }}">

                <div class="form form-l2">
                    <ul class="list-inline nav nav-tabs">

                        <li class="active"><a class="tab" data-toggle="tab" href="#private-health-insurance">Private Health Insurance</a></li>
                        <li class=""><a class="tab" data-toggle="tab" href="#help">HECS/Help Debt</a></li>
                        <li><a class="tab" data-toggle="tab" href="#zone-offsets">Zone Offsets</a></li>
                    </ul>
                    <div class="form form-l2">

                        <div class="tab-content">

                            {{-- private_health_insurance --}}
                            <div class="tab-pane active" id="private-health-insurance">
                                <div class="section section-l8">

                                    {{ Gy::getMessageHasCoveredPPHC() }}

                                    <div class="section-heading">
                                        <h3>private health insurance</h3>
                                        <!-- <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>                   -->
                                        <a href="#" id="add_car_expenses" class="add_field_item btn btn-bordered btn-sm btn-rounded">
                                            <span class="fa fa-plus"></span> Add New
                                        </a>
                                    </div>
                                    <div class="form-fieldset @if(TaxMedicare::hasCoveredPPHC(Session::get('user_tax_year_id'))) fieldset-exclude-first @endif">
                                        @if (isset($private_health_insurances) && count($private_health_insurances) > 0)
                                            <?php $index = 0; ?>
                                            @foreach($private_health_insurances as $private_health_insurance)
                                                @include('taxform::tax_form.tax_offsets._private_health_insurance')
                                                <?php $index++; ?>
                                            @endforeach
                                        @else
                                            <?php $index = 0; ?>
                                            @include('taxform::tax_form.tax_offsets._private_health_insurance')
                                        @endif
                                    </div>
                                    <div class="form-2cloned" style="display:none">
                                        <?php $index = 0; ?>
                                        @include('taxform::tax_form.tax_offsets._private_health_insurance')
                                    </div>
                                </div>

                            </div> <!-- /#private-health-insurance -->

                            {{-- Help Dept/Hecs --}}
                            <div id="help" class="tab-pane">

                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>HECS/Help Debt</h3>
                                    </div>
                                    @include('taxform::tax_form.tax_offsets._help')
                                </div>

                            </div> <!-- /#help -->


                            <div id="zone-offsets" class="tab-pane">

                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Zone Offsets</h3>
                                        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="You may be able to claim the tax offset if you have lived or worked in a remote or isolated area of Australia, not including an offshore oil or gas rig (a remote area), or served overseas as a member of the Australian Defence Force."></span>
                                    </div>
                                    @include('taxform::tax_form.tax_offsets._zone_offset')
                                </div>
                            </div> <!-- /#zone-offsets -->

                        </div> <!-- /.tab-content -->


                        <div class="form-group-actions">
                            <a href="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions') }}" class="btn btn-lg btn-green">Back<span class=""></span></a>
                            <button type="submit" name="submit_action" value="save" class="btn_action btn btn-lg btn-primary">
                                <i class="fa fa-spinner fa-spin"></i>
                                <i class="fa fa-ok"></i>
                                SAVE
                            </button>
                            <button type="submit" name="submit_action" value="save_continue" class="btn_action btn btn-lg btn-primary">
                                <i class="fa fa-spinner fa-spin"></i>
                                <i class="fa fa-ok"></i>
                                Save and Continue
                                <span class="fa fa-arrow-right"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- /.t-content -->

    <div class="t-sidebar">
        @include('taxform::tax_form._refund_status')
        @include('taxform::tax_form.tax_offsets._sidebar')
    </div>
</div>

<script>
    $(function(){
        $.taxform.taxOffsets.init();
    });
</script>
@stop