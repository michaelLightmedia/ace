
<div id="tax_other_income_{{  isset($other_income) ? $other_income->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_income.'.$index.'.income_type_guid') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_other_income_income_type_guid" class="label-control">Type: </label>
                <div class="form-group-control">
                    <select name="other_income[{{ $index }}][income_type_guid]" id="input_other_income_income_type_guid" class="form-control select2">
                        @foreach(TaxIncomeType::all() as $row)
                        <option {{ is_selected( Input::old('other_income.'.$index.'.income_type_guid', isset($other_income) ? $other_income->income_type_guid : null),$row->guid) }} value="{{ $row->guid }}">{{ $row->income_type_name }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <?php list($error_msg, $error_class) = validator_res($errors,'other_income.'.$index.'.description') ?>
    <div class="form-group {{ $error_class  }}">
        <label for="#other_income_description" class="label-control">Description: </label>
        <div class="form-group-control">
            <textarea name="" id="" cols="30" rows="4" value="{{{ Input::old('other_income.'.$index.'.description', isset($other_income) ? $other_income->description : null) }}}" id="other_income_description" name="other_income[{{ $index }}][description]" type="text" class="form-control"></textarea>
            {{ $error_msg }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_income.'.$index.'.tax_withheld') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_income_tax_withheld" class="label-control">Tax Witheld:</label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('other_income.'.$index.'.tax_withheld', isset($other_income) ? $other_income->tax_withheld : null) }}}" id="other_income_tax_withheld" name="other_income[{{ $index }}][tax_withheld]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'other_income.'.$index.'.amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#other_income_amount" class="label-control">Amount: </label>
                <div class="form-group-control  form-group-currency">
                    <input value="{{{ Input::old('other_income.'.$index.'.amount', isset($other_income) ? $other_income->amount : null) }}}" id="other_income_amount" name="other_income[{{ $index }}][amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
