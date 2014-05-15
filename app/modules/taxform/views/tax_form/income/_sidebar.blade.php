
<div id="income_summary" class="layout-l4">
        <header class="layout-heading">
            <h1 class="layout-title">Summary</h1>
        </header>
        <div  class="box-detail-listing">
            <table class="table table-striped table-l2">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Taxable Income</th>
                        <th>Tax Witheld</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{ $income_summary->getIncomeSummary() }}
                </tbody>
                <tfoot class="table-footer">
                    <tr>
                        <th>Total</th>
                        <th> {{ format_currency($income_summary->getTotalTaxableIncome(),0) }} </th>
                        <th> {{ format_currency($income_summary->getTotalTaxWithHeldIncome(),0) }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>