
<div id="tax_dividend_{{  isset($dividend) ? $dividend->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-12">
            <?php list($error_msg, $error_class) = validator_res($errors,'dividend.'.$index.'.company') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#dividend_company" class="label-control">Company: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('dividend.'.$index.'.company', isset($dividend) ? $dividend->company : null) }}}" id="dividend_company" name="dividend[{{ $index }}][company]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'dividend.'.$index.'.unfranked_divident') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#dividend_unfranked_divident" class="label-control">Unfranked Dividend: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('dividend.'.$index.'.unfranked_divident', isset($dividend) ? $dividend->unfranked_divident : null) }}}" id="dividend_unfranked_divident" name="dividend[{{ $index }}][unfranked_divident]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'dividend.'.$index.'.franked_divident') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#dividend_franked_divident" class="label-control">Franked dividend: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('dividend.'.$index.'.franked_divident', isset($dividend) ? $dividend->franked_divident : null) }}}" id="dividend_franked_divident" name="dividend[{{ $index }}][franked_divident]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'dividend.'.$index.'.franking_credit') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#dividend_franking_credit" class="label-control">Franking Credit: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('dividend.'.$index.'.franking_credit', isset($dividend) ? $dividend->franking_credit : null) }}}" id="dividend_franking_credit" name="dividend[{{ $index }}][franking_credit]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'dividend.'.$index.'.tax_withheld') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#dividend_tax_withheld" class="label-control">Tax withheld: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('dividend.'.$index.'.tax_withheld', isset($dividend) ? $dividend->tax_withheld : null) }}}" id="dividend_tax_withheld" name="dividend[{{ $index }}][tax_withheld]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
