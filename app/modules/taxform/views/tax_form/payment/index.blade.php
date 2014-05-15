@extends('layouts.tax_form')

@section('content')

<div class="page-heading">
    <div class="container">
        <h1>Payment</h1>
    </div>
</div>

<div class="container">
    <form action="#" autocomplete="off" method="POST">

        <div class="section section-l5 section-col2">
            <div class="row ">
                <div class="col-md-6 col-item">
                    <div class="col-md-10 pull-left">
                        <div class="form-group">
                            <label class="label-lg label-control" for="">Tax Return for tax year</label>
                            {{ $user_tax_year->tax_year }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-item">

                    <div class="col-md-10 pull-right">
                        <label class="label-lg label-control " for="">Services</label>
                        <ul class="list-stacked list-check">
                            <li>Review by tax Accountant</li>
                            <li>Process by tax Agent (Submission to ATO)</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="section section-l5">
            <div class="payment-options">
                <div class="payment-price"><h1>{{ format_currency(get_settings('cost_amount',0)) }}</h1><span class="'">Cost</span></div>
                <div class="payment-tagline"><h4>Choose a secure payment method</h4></div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group center">
                            @if ($income_summary->isEstimateAmountRefundable())
                            <div class="col-md-4">
                                <div class="radio">
                                    <label class="checkbox-inline">
                                        <input type="radio" value="fee_from_refund" name="payment_type" id="inlineCheckbox1">
                                        <div class="checkbox-img"><img alt="" src="placeholders/refund.png"></div>
                                        <p>Fee from refund</p>
                                    </label>
                                </div>
                            </div>
                            @endif

                            <div class="col-md-4">
                                <div class="radio">
                                    <label class="checkbox-inline">
                                        <input type="radio" value="payment_service_provider" name="payment_type" id="inlineCheckbox1">
                                        <div class="checkbox-img"><img alt="" src="placeholders/credit.png"></div>
                                        <p>Pay with a credit card</p>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-l5">

            <ul class="list-inline tab-control">
                @if (get_settings('payment_gateway','free') != 'free')
                <li class="active"><a data-toggle="tab" href="#bill">Billing and Credit Card Details</a></li>
                @endif
                <li><a data-toggle="tab" href="#bank">Bank Details</a></li>
            </ul>

            <div class="tab-content">
                @if (get_settings('payment_gateway','free') != 'free')
                <div id="bill" class="tab-pane active">
                    <br />
                    @include('taxform::tax_form.payment._billing')
                </div>
                @endif
                <div id="bank" class="tab-pane">
                    <br />
                    @include('taxform::tax_form.payment._bank')
                </div>
            </div>

            <div class="section-footer">
                <button type="submit" class="btn btn-teal btn-lg">Submit Return and Pay<span class="fa fa-arrow-right"></span></button>
            </div>
        </div>
    </form>
</div>

@stop