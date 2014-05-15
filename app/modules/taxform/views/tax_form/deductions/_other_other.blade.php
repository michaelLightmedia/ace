<div id="tax_other_other_{{  isset($other_other) ? $other_other->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-9">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_other.'.$index.'.description') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_other_description" class="label-control">Description: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('other_other.'.$index.'.description', isset($other_other) ? $other_other->description : null) }}}" id="other_other_description" name="other_other[{{ $index }}][description]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_other.'.$index.'.amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_other_amount" class="label-control">Amount: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('other_other.'.$index.'.amount', isset($other_other) ? $other_other->amount : null) }}}" id="other_other_amount" name="other_other[{{ $index }}][amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
