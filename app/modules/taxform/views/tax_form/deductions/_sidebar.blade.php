<div id="deduction_summary" class="layout-l4">
    <header class="layout-heading">
        <h1 class="layout-title">Summary</h1>
    </header>
    <div class="box-detail-listing">
        <table class="table table-striped table-l2">
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
            <tfoot class="table-footer">
            <tr>
                <th>Total</th>
                <th>{{ format_currency($income_summary->getTotalDeductionAmount(),0) }}</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>