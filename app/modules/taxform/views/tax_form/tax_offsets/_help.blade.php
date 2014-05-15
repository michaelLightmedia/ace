
<div id="help_debt">
    <?php list($error_msg, $error_class) = validator_res($errors,'help[has_help_debt]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#input_help_has_help_debt" class="label-control">Do you have a HECS/HELP Debt? </label>
        <select name="help[has_help_debt]" id="input_help_has_help_debt" class="form-control select2">
            @foreach(Gy::getSelectYesOrNo() as $key=>$value)
            <option {{ is_selected( Input::old('help[has_help_debt]', isset($help) ? $help->has_help_debt : null),$key) }} value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        {{ $error_msg }}
    </div>

    <?php list($error_msg, $error_class) = validator_res($errors,'help[help_debt_amount]') ?>
    <div class="form-group {{ $error_class  }}">
        <label for="#help_help_debt_amount" class="label-control">If you know the amount, please enter here: </label>
        <div class="form-group-control form-group-currency">
            <input value="{{{ Input::old('help[help_debt_amount]', isset($help) ? $help->help_debt_amount : null) }}}" id="help_help_debt_amount" name="help[help_debt_amount]" type="text" class="form-control ">
            {{ $error_msg }}
        </div>
    </div>
</div>
