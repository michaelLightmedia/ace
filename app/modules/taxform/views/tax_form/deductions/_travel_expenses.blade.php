<div id="tax_travel_expense_{{  isset($travel_expense) ? $travel_expense->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-9">
            <?php list($error_msg, $error_class) = validator_res($errors,'travel_expenses.'.$index.'.description') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#travel_expenses_description" class="label-control">Description: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('travel_expenses.'.$index.'.description', isset($travel_expense) ? $travel_expense->description : null) }}}" id="travel_expenses_description" name="travel_expenses[{{ $index }}][description]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'travel_expenses.'.$index.'.amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#travel_expenses_amount" class="label-control">Amount: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('travel_expenses.'.$index.'.amount', isset($travel_expense) ? $travel_expense->amount : null) }}}" id="travel_expenses_amount" name="travel_expenses[{{ $index }}][amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
