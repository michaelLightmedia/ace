
@if (isset($address))
<input type="hidden" name="address[id]" value="{{ $address->id }}">
@endif

<div id="postal_address">

    <?php list($error_msg, $error_class) = validator_res($errors,'address[postal_address_1]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#input_postal_address_1" class="label-control">Address 1: </label>
        <div class="form-group-control">
            <input  value="{{{ Input::old('address[postal_address_1]', isset($address) ? $address->postal_address_1 : null) }}}" id="input_postal_address_1" name="address[postal_address_1]" type="text" class="form-control">
            {{ $error_msg }}
        </div>
    </div>

    <?php list($error_msg, $error_class) = validator_res($errors,'address[postal_address_2]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#input_postal_address_2" class="label-control">Address 2: </label>
        <div class="form-group-control">
            <input value="{{{ Input::old('address[postal_address_2]', isset($address) ? $address->postal_address_2 : null) }}}" id="input_postal_address_2" name="address[postal_address_2]" type="text" class="form-control">
            {{ $error_msg }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?php list($error_msg, $error_class) = validator_res($errors,'address[postal_post_code]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_postal_post_code" class="label-control">Post Code: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('address[postal_post_code]', isset($address) ? $address->postal_post_code : null) }}}" id="input_postal_post_code" name="address[postal_post_code]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <?php list($error_msg, $error_class) = validator_res($errors,'address[postal_suburb]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_postal_suburb" class="label-control">Suburb: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('address[postal_suburb]', isset($address) ? $address->postal_suburb : null) }}}" id="input_postal_suburb" name="address[postal_suburb]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'address[postal_state]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_postal_state" class="label-control">State
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <div class="form-group-control">
                    <select name="address[postal_state]" id="input_postal_state" class="form-control select2">
                        @foreach(Gy::auStates() as $key=>$value)
                        <option {{ is_selected( Input::old('address[postal_state]', isset($address) ? $address->postal_state : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="" id="home_address">
    <div class="section-heading">
        <h3>Enter your current Home Address</h3>
    </div>
    <div class="form-group">
        <label>
            <input {{ is_checked( Input::old('address[home_is_postal]', isset($address) ? $address->home_is_postal : null),1 ) }}  id="input_home_is_postal" name="address[home_is_postal]" value="1" type="checkbox">
            Is your home address the same as your Postal Address ?
        </label>
    </div>
    <?php list($error_msg, $error_class) = validator_res($errors,'address[address_1]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#input_home_address_1" class="label-control">Address 1: </label>
        <div class="form-group-control">
            <input  value="{{{ Input::old('address[address_1]', isset($address) ? $address->home_address_1 : null) }}}" id="input_home_address_1" name="address[home_address_1]"  type="text" class="form-control">
            {{ $error_msg }}
        </div>
    </div>

    <?php list($error_msg, $error_class) = validator_res($errors,'address[home_address_2]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#input_home_address_2" class="label-control">Address 2: </label>
        <div class="form-group-control">
            <input value="{{{ Input::old('address[home_address_2]', isset($address) ? $address->home_address_2 : null) }}}" id="input_home_address_2" name="address[home_address_2]"  type="text" class="form-control">
            {{ $error_msg }}
        </div>
    </div>


    <div class="row">
        <div class="col-md-2">
            <?php list($error_msg, $error_class) = validator_res($errors,'address[home_post_code]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_home_post_code" class="label-control">Post Code: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('address[home_post_code]', isset($address) ? $address->home_post_code : null) }}}" id="input_home_post_code" name="address[home_post_code]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <?php list($error_msg, $error_class) = validator_res($errors,'address[home_suburb]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_home_suburb" class="label-control">Suburb: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('address[home_suburb]', isset($address) ? $address->home_suburb : null) }}}" id="input_home_suburb" name="address[home_suburb]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'address[home_state]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_home_state" class="label-control">State
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <div class="form-group-control">
                    <select name="address[home_state]" id="input_home_state" class="form-control select2">
                        @foreach(Gy::auStates() as $key=>$value)
                        <option {{ is_selected( Input::old('address[home_state]', isset($address) ? $address->home_state : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>

