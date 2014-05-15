@extends('layouts.tax_form')

@section('content')

<div class="banner banner-process">
    <span class="itp-rocket"></span>
    <span class="itp-satellite"></span>

</div>

<div class="container-fluid container-l2">

    <div class="t-content">
        <div class="t-content-inner">

            @include('taxform::tax_form._process_steps')

            <div class="section section-l7">
                {{ Gy::system_messages() }}

                <header class="heading heading-l2 l2-2">
                    <h1>Summary</h1>
                </header>

                <div class="box box-l3">
                    <div class="box box-l2">

                        <header class="box-heading">
                            <h1 class="box-title">Income</h1>
                        </header>

                        <div  class="box-detail-listing">
                            <table class="table table-hover table-l2">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Taxable Income</th>
                                    <th>Tax Witheld</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{ $income_summary->getIncomeSummary() }}
                                </tbody>
                            </table>

                            <div class="box-footer">
                                <div class="total-row">
                                    <span class="total-title">Total Income</span>
                                    <span class="total-price">{{ format_currency($income_summary->getTotalTaxableIncome()) }}</span>
                                </div>
                                <div class="total-row">
                                    <span class="total-title">Total Tax Withheld</span>
                                    <span class="total-price">{{ format_currency($income_summary->getTotalTaxWithHeldIncome()) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box-l2">
                        <header class="box-heading">
                            <h1 class="box-title">Deduction</h1>
                        </header>
                        <div class="box-detail-listing">

                            <table class="table table-l2">
                                <thead>
                                <tr>
                                    <th>Type </th>
                                    <th>Amount </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                {{ $income_summary->getDeductionSummary() }}
                                </tbody>
                            </table>

                            <div class="box-footer">
                                <div class="total-row">
                                    <span class="total-title">Total Deduction</span>
                                    <span class="total-price">{{ format_currency($income_summary->getTotalDeductionAmount()) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-l2">
                        <header class="box-heading">
                            <h1 class="box-title">Tax Offset and Rebates</h1>
                        </header>
                        <div class="box-detail-listing">

                            <table class="table table-l2">
                                <thead>
                                <tr>
                                    <th>Type </th>
                                    <th>Amount </th>
                                </tr>
                                </thead>
                                <tbody>
                                {{ $income_summary->getZoneOffsetSummary() }}
                                </tbody>
                            </table>


                            <div class="box-footer">
                                <div class="total-row">
                                    <span class="total-title">Total Tax Offset and Rebates</span>
                                    <span class="total-price">{{ format_currency($income_summary->getTotalTaxOffset()) }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="section-footer">
                    <div class="refund-l2">
                        <div class="refund-detail">
                            <h4 class="refund-title">Refund Estimate</h4>
                            <span class="refund-price">{{ format_currency($income_summary->getEstimateAmount()) }}</span>
                        </div>
                        <div class="refund-action">
                            <a href="{{ url('/tax-form/' . Session::get('user_tax_year_id') . '/payment') }}" class="btn_action btn-block btn btn-orange">
                                <i class="fa fa-spinner fa-spin"></i>
                                <i class="fa fa-ok"></i>
                                Submit And Pay
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- /.t-content -->

    <div class="t-sidebar">
        @include('taxform::tax_form._refund_status')
        @include('taxform::tax_form.summary._sidebar')
    </div>
</div>

<script>
    $(function(){
        $.taxform.taxOffsets.init();
    });
</script>
@stop