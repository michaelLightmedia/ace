
<div id="transaction">
    <div class="row">
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'transaction.customer_firstname') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#transaction_customer_firstname" class="label-control">First Name: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('transaction.customer_firstname', isset($transaction) ? $transaction->customer_firstname : $user_tax_detail->firstname) }}}" id="transaction_customer_firstname" name="transaction[customer_firstname]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'transaction.customer_lastname') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#transaction_customer_lastname" class="label-control">Last Name: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('transaction.customer_lastname', isset($transaction) ? $transaction->customer_lastname : $user_tax_detail->lastname) }}}" id="transaction_customer_lastname" name="transaction[customer_lastname]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?php list($error_msg, $error_class) = validator_res($errors,'transaction[customer_title]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_transaction_customer_title" class="label-control">Title:
                </label>
                <select name="transaction[customer_title]" id="input_transaction_customer_title" class="form-control select2">
                    @foreach(Gy::getTitles() as $key=>$value)
                    <option {{ is_selected( Input::old('transaction[customer_title]', isset($transaction) ? $transaction->customer_title : $user_tax_detail->salutation),$key) }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                {{ $error_msg }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php list($error_msg, $error_class) = validator_res($errors,'transaction.customer_address1') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#transaction_customer_address1" class="label-control">Address line 1: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('transaction.customer_address1', isset($transaction) ? $transaction->customer_address1 : null) }}}" id="transaction_customer_address1" name="transaction[customer_address1]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php list($error_msg, $error_class) = validator_res($errors,'transaction.customer_address2') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#transaction_customer_address2" class="label-control">Address line 2: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('transaction.customer_address2', isset($transaction) ? $transaction->customer_address2 : null) }}}" id="transaction_customer_address2" name="transaction[customer_address2]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?php list($error_msg, $error_class) = validator_res($errors,'transaction.customer_post_code') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#transaction_customer_post_code" class="label-control">Postal Code: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('transaction.customer_post_code', isset($transaction) ? $transaction->customer_post_code : null) }}}" id="transaction_customer_post_code" name="transaction[customer_post_code]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'transaction.customer_suburb') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#transaction_customer_suburb" class="label-control">Suburb: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('transaction.customer_suburb', isset($transaction) ? $transaction->customer_suburb : null) }}}" id="transaction_customer_suburb" name="transaction[customer_suburb]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
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
        </div>
    </div>
</div>
