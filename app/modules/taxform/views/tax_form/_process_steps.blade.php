
<div class="form-item">
    <div class="process-illustration {{ Gy::whichProcessActive( (isset($which_process) ? $which_process : "income") ) }} ">
        <div class="process process-2">
            @if ($which_process == "income")
            <div class="process-indicator">
                <span class="itp-spaceman"></span>
                <div class="process-indicator-msg">
                    <p>Let's get Started :)</p>
                </div>
            </div>
            @endif

            <a href="{{ url('/tax-form/'.Session::get("user_tax_year_id").'/income') }} ">
                <span class="process-mark"><b class="icon icon-rocket"></b></span>
                Income
                <span class="fa fa-check"></span>
            </a>
        </div>
        <div class="process process-3">

            @if ($which_process == "deductions")
            <div class="process-indicator">
                <span class="itp-spaceman"></span>
                <div class="process-indicator-msg">
                    <p>Great!, your are 55% Done. :)</p>
                </div>
            </div>
            @endif

            <a href="@if ($income_summary->canProceed2Deductions()) {{ url('/tax-form/'.Session::get("user_tax_year_id").'/deductions') }} @else # @endif">
                <span class="process-mark"><b class="icon icon-rocket"></b></span>
                Deductions
                <span class="fa fa-check"></span>
            </a>
        </div>
        <div class="process process-4">

            @if ($which_process == "tax_offsets")
            <div class="process-indicator">
                <span class="itp-spaceman"></span>
                <div class="process-indicator-msg">
                    <p>Great!, almost Done. :)</p>
                </div>
            </div>
            @endif

            <a href="@if ($income_summary->canProceed2TaxOffsets()) {{ url('/tax-form/'.Session::get("user_tax_year_id").'/tax-offsets') }} @else # @endif">
                <span class="process-mark"><b class="icon icon-rocket"></b></span>
                Tax Offsets
                <span class="fa fa-check"></span>
            </a>
        </div>

        <div class="process process-5">

            @if ($which_process == "summary")
            @endif

            <div class="process-indicator-finished">
                <span class="itp-moon"></span>
            </div>


            <a href="@if ($income_summary->canProceed2TaxOffsets()) {{ url('/tax-form/'.Session::get("user_tax_year_id").'/summary') }} @else # @endif">
                <span class="process-mark"><b class="icon icon-rocket"></b></span>
                Summary
                <span class="fa fa-check"></span>
            </a>
        </div>
    </div>
</div>
