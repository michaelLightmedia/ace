
<div id="tax_bank_interest_{{  isset($bank_interest) ? $bank_interest->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'bank_interest.'.$index.'.bank') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#bank_interest_bank" class="label-control">Bank / Account No. <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span></label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('bank_interest.'.$index.'.bank', isset($bank_interest) ? $bank_interest->bank : null) }}}" id="bank_interest_bank" name="bank_interest[{{ $index }}][bank]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'bank_interest.'.$index.'.interest') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#bank_interest_interest" class="label-control">Interest Amount</label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('bank_interest.'.$index.'.interest', isset($bank_interest) ? $bank_interest->interest : null) }}}" id="bank_interest_interest" name="bank_interest[{{ $index }}][interest]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'bank_interest.'.$index.'.tax_withheld') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#bank_interest_tax_withheld" class="label-control">Tax Withheld</label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('bank_interest.'.$index.'.tax_withheld', isset($bank_interest) ? $bank_interest->tax_withheld : null) }}}" id="bank_interest_tax_withheld" name="bank_interest[{{ $index }}][tax_withheld]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
