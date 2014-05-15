
<div id="refund_estimate" class="layout-l3">
    <h1 class="layout-title">Tax Return Form {{ $user_tax_year->tax_year }}</h1>
    <div class="layout-circle">
        <span class="title">{{ format_currency($income_summary->getEstimateAmount(),0) }}</span>

        @if ($income_summary->isEstimateAmountRefundable())
        <span class="label">Estimated Tax Refund </span>
        @else
        <span class="label">Estimated Tax Payable </span>
        @endif
    </div>

    {{ Gy::getUserTaxYearStatus( $user_tax_year->status ) }}
</div>