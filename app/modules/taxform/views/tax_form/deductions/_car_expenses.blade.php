
<div id="tax_car_expense_{{  isset($car_expense) ? $car_expense->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'car_expenses.'.$index.'.registration') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#car_expenses_registration" class="label-control">Registration: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('car_expenses.'.$index.'.registration', isset($car_expense) ? $car_expense->registration : null) }}}" id="car_expenses_registration" name="car_expenses[{{ $index }}][registration]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'car_expenses.'.$index.'.cents_per_kilometre_id') ?>
            <div class="form-group {{ $error_class }}  @if (isset($car_expense) && $car_expense->has_claimed_log_book == 1) hidden  @endif">
                <label for="#input_car_expenses_cents_per_kilometre_id" class="label-control">Engine Capacity:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <div class="form-group-control">
                    <select name="car_expenses[{{ $index }}][cents_per_kilometre_id]" id="input_car_expenses_cents_per_kilometre_id" class="form-control select2 selectpicker">
                        @foreach(CentsPerKilometre::all() as $cents_per_kilometre)
                        <option {{ is_selected( Input::old('car_expenses.'.$index.'.cents_per_kilometre_id', isset($car_expense) ? $car_expense->cents_per_kilometre_id : null),$cents_per_kilometre->id) }} value="{{ $cents_per_kilometre->id }}">{{ $cents_per_kilometre->engine_capacity }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'car_expenses.'.$index.'.business_kilometre') ?>
            <div class="form-group {{ $error_class  }}   @if (isset($car_expense) && $car_expense->has_claimed_log_book == 1) hidden  @endif">
                <label for="#car_expenses_business_kilometre" class="label-control">Business Kilometres: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('car_expenses.'.$index.'.business_kilometre', isset($car_expense) ? $car_expense->business_kilometre : null) }}}" id="car_expenses_business_kilometre" name="car_expenses[{{ $index }}][business_kilometre]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="form-group form-group-l5">
        <input type="hidden" name="car_expenses[{{ $index }}][has_claimed_log_book]" value="{{{ Input::old('car_expenses.'.$index.'.has_claimed_log_book', isset($car_expense) ? $car_expense->has_claimed_log_book : 0) }}}" />
        If you are claiming using the Log Book, <a href="#" class="show_log_book">
            @if(isset($car_expense) && $car_expense->has_claimed_log_book == 1)
                Cancel
            @else
                Click here
            @endif
        </a>
    </div>
    <div class="log_book_wrapper row  @if(isset($car_expense) && $car_expense->has_claimed_log_book != 1) hidden @endif " >
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'car_expenses.'.$index.'.total_expenses') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#car_expenses_total_expenses" class="label-control">Total Expenses:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Put total expenses here, we will work out your deduction."></span>
                </label>
                    <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('car_expenses.'.$index.'.total_expenses', isset($car_expense) ? $car_expense->total_expenses : null) }}}" id="car_expenses_total_expenses" name="car_expenses[{{ $index }}][total_expenses]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'car_expenses.'.$index.'.business_percentage') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#car_expenses_business_percentage" class="label-control">Business Use %: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('car_expenses.'.$index.'.business_percentage', isset($car_expense) ? $car_expense->business_percentage : null) }}}" id="car_expenses_business_percentage" name="car_expenses[{{ $index }}][business_percentage]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'car_expenses.'.$index.'.car_purchase_date') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#car_expenses_car_purchase_date" class="label-control">Car Purchase Date: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('car_expenses.'.$index.'.car_purchase_date', isset($car_expense) ? db2dpicker($car_expense->car_purchase_date) : null) }}}" id="car_expenses_car_purchase_date" name="car_expenses[{{ $index }}][car_purchase_date]" type="text" class="form-control form-control-datepicker datetimepicker">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'car_expenses.'.$index.'.car_purchase_amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#car_expenses_car_purchase_amount" class="label-control">Car Purchase Amount: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('car_expenses.'.$index.'.car_purchase_amount', isset($car_expense) ? $car_expense->car_purchase_amount : null) }}}" id="car_expenses_car_purchase_amount" name="car_expenses[{{ $index }}][car_purchase_amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
