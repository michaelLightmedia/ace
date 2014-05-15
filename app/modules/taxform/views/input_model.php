
<?php list($error_msg, $error_class) = validator_res($errors,'transaction.'.$index.'.customer_title') ?>
<div class="form-group {{ $error_class  }}">
    <label for="#transaction_customer_title" class="label-control">Tax Claim Code: </label>
    <input value="{{{ Input::old('transaction.'.$index.'.customer_title', isset($transaction) ? $transaction->customer_title : null) }}}" id="transaction_customer_title" name="transaction[{{ $index }}][customer_title]" type="text" class="form-control">
    {{ $error_msg }}
</div>


<?php list($error_msg, $error_class) = validator_res($errors,'transaction.'.$index.'.customer_title') ?>
<div class="form-group {{ $error_class }}">
    <label for="#input_transaction_customer_title" class="label-control">Type:
        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
    </label>
    <select name="transaction[{{ $index }}][customer_title]" id="input_transaction_customer_title" class="form-control select2">
        @foreach(Gy::getPHITaxClaimCode() as $key=>$value)
        <option {{ is_selected( Input::old('transaction.'.$index.'.customer_title', isset($transaction) ? $transaction->customer_title : null),$key) }} value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    {{ $error_msg }}
</div>

<?php list($error_msg, $error_class) = validator_res($errors,'transaction[customer_title]') ?>
<div class="form-group {{ $error_class }}">
    <label for="#input_transaction_customer_title" class="label-control">Type:
        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
    </label>
    <div class="form-group-control">
        <select name="transaction[customer_title]" id="input_transaction_customer_title" class="form-control select2">
            @foreach(Gy::getTitles() as $key=>$value)
            <option {{ is_selected( Input::old('transaction[customer_title]', isset($transaction) ? $transaction->customer_title : null),$key) }} value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        {{ $error_msg }}
    </div>
</div>


<?php list($error_msg, $error_class) = validator_res($errors,'transaction.'.$index.'.customer_title') ?>
<div class="form-group {{ $error_class }}">
    <label for="#input_transaction_customer_title" class="label-control">Type:
        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
    </label>
    <select name="transaction[{{ $index }}][customer_title]" id="input_transaction_customer_title" class="form-control select2">
        @foreach(Gy::auStates() as $key=>$value)
        <option {{ is_selected( Input::old('transaction.'.$index.'.customer_title', isset($transaction) ? $transaction->customer_title : null),$key) }} value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    {{ $error_msg }}
</div>

<?php list($error_msg, $error_class) = validator_res($errors,'transaction[customer_title]') ?>
<div class="form-group {{ $error_class }}">
    <label for="#input_transaction_customer_title" class="label-control">Type:
        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
    </label>
    <select name="transaction[customer_title]" id="input_transaction_customer_title" class="form-control select2">
        @foreach(Gy::getTitles() as $key=>$value)
        <option {{ is_selected( Input::old('transaction[customer_title]', isset($transaction) ? $transaction->customer_title : null),$key) }} value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    {{ $error_msg }}
</div>



<div class="row">
    <div class="col-md-12">
        <?php list($error_msg, $error_class) = validator_res($errors,'transaction.'.$index.'.customer_suburb') ?>
        <div class="form-group {{ $error_class  }}">
            <label for="#transaction_customer_suburb" class="label-control">Last Name: </label>
            <div class="form-group-control form-group-currency">
                <input value="{{{ Input::old('transaction.'.$index.'.customer_suburb', isset($transaction) ? $transaction->customer_suburb : null) }}}" id="transaction_customer_suburb" name="transaction[{{ $index }}][customer_suburb]" type="text" class="form-control ">
                {{ $error_msg }}
            </div>
        </div>
    </div>
</div>

<?php list($error_msg, $error_class) = validator_res($errors,'transaction[customer_title]') ?>
<div class="col-md-4 form-group {{ $error_class  }}">
    <input value="{{{ Input::old('transaction[customer_title]', isset($transaction) ? $transaction->customer_title : null) }}}" id="transaction_customer_title" name="transaction[customer_title]" type="text" class="form-control">
    {{ $error_msg }}
</div>

<?php list($error_msg, $error_class) = validator_res($errors,'transaction[state]') ?>
<div class="form-group {{ $error_class }}">
    <label for="#input_state" class="label-control">State
        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
    </label>
    <div class="form-group-control">
        <select name="transaction[state]" id="input_state" class="form-control select2">
            @foreach(Gy::auStates() as $key=>$value)
            <option {{ is_selected( Input::old('transaction[state]', isset($transaction) ? $transaction->state : null),$key) }} value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        {{ $error_msg }}
    </div>
</div>

<label for="#" class="col-md-3 label-control mt-10px">Special Zone B (Y): </label>

<?php list($error_msg, $error_class) = validator_res($errors,'zone_offset[zone_z_days]') ?>
<div class="col-md-4 form-group {{ $error_class  }}">
    <input value="{{{ Input::old('zone_offset[zone_z_days]', isset($private_health_insurance) ? $private_health_insurance->zone_z_days : null) }}}" id="zone_offset_zone_z_days" name="zone_offset[zone_z_days]" type="text" class="form-control">
    {{ $error_msg }}
</div>

<?php list($error_msg, $error_class) = validator_res($errors,'zone_offset[zone_z_amount]') ?>
<div class="col-md-4 form-group {{ $error_class  }}">
    <input value="{{{ Input::old('zone_offset[zone_z_amount]', isset($private_health_insurance) ? $private_health_insurance->zone_z_amount : null) }}}" id="zone_offset_zone_z_amount" name="zone_offset[zone_z_amount]" type="text" class="form-control">
    {{ $error_msg }}
</div>


<div class="col-md-3">
    <?php list($error_msg, $error_class) = validator_res($errors,'transaction[mobile]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#input_mobile" class="label-control">Mobile: </label>
        <input value="{{{ Input::old('transaction[mobile]', isset($transaction) ? $transaction->mobile : null) }}}" id="input_mobile" name="transaction[mobile]" type="text" class="form-control">
        {{ $error_msg }}
    </div>
</div>

<div class="col-md-6">
    <?php list($error_msg, $error_class) = validator_res($errors,'transaction.'.$index.'.bank') ?>
    <div class="form-group {{ $error_class  }}">
        <label for="#transaction_bank" class="label-control">Bank / Account No. <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span></label>
        <div class="form-group-control">
            <input value="{{{ Input::old('transaction.'.$index.'.bank', isset($transaction) ? $transaction->bank : null) }}}" id="transaction_bank" name="transaction[{{ $index }}][bank]" type="text" class="form-control">
            {{ $error_msg }}
        </div>
    </div>
</div>
