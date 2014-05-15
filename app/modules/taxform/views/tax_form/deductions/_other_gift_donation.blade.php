<div id="tax_other_gift_donation_{{  isset($other_gift_donation) ? $other_gift_donation->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-9">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_gift_donation.'.$index.'.description') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_gift_donation_description" class="label-control">Description: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('other_gift_donation.'.$index.'.description', isset($other_gift_donation) ? $other_gift_donation->description : null) }}}" id="other_gift_donation_description" name="other_gift_donation[{{ $index }}][description]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_gift_donation.'.$index.'.amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_gift_donation_amount" class="label-control">Amount: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('other_gift_donation.'.$index.'.amount', isset($other_gift_donation) ? $other_gift_donation->amount : null) }}}" id="other_gift_donation_amount" name="other_gift_donation[{{ $index }}][amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
