<div id="tax_other_dividend_deductions_{{  isset($other_dividend_deduction) ? $other_dividend_deduction->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-9">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_dividend_deductions.'.$index.'.description') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_dividend_deductions_description" class="label-control">Description: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('other_dividend_deductions.'.$index.'.description', isset($other_dividend_deduction) ? $other_dividend_deduction->description : null) }}}" id="other_dividend_deductions_description" name="other_dividend_deductions[{{ $index }}][description]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_dividend_deductions.'.$index.'.amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_dividend_deductions_amount" class="label-control">Amount: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('other_dividend_deductions.'.$index.'.amount', isset($other_dividend_deduction) ? $other_dividend_deduction->amount : null) }}}" id="other_dividend_deductions_amount" name="other_dividend_deductions[{{ $index }}][amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
