
@if (isset($detail))
<input type="hidden" name="detail[id]" value="{{ $detail->id }}">
@endif

    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[firstname]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_firstname" class="label-control">First Name: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('detail[firstname]', isset($detail) ? $detail->firstname : null) }}}" id="input_firstname" name="detail[firstname]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
        
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[email]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_email" class="label-control">Email: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('detail[email]', isset($detail) ? $detail->email : null) }}}" id="input_email" name="detail[email]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[lastname]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_lastname" class="label-control">Last Name: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('detail[lastname]', isset($detail) ? $detail->lastname : null) }}}" id="input_lastname" name="detail[lastname]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[occupation]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_occupation" class="label-control">Occupation: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('detail[occupation]', isset($detail) ? $detail->occupation : null) }}}" id="input_occupation" name="detail[occupation]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[salutation]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_detail_salutation" class="label-control">Type:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <div class="form-group-control">
                    <select name="detail[salutation]" id="input_detail_salutation" class="form-control select2">
                        @foreach(Gy::getTitles() as $key=>$value)
                        <option {{ is_selected( Input::old('detail[salutation]', isset($detail) ? $detail->salutation : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[tax_file_number]') ?>
            <div class="form-group form-group-right {{ $error_class }}">
                <label for="#input_tax_file_number" class="label-control">TFN: </label>

                <div class="form-group-control">
                    <input value="{{{ Input::old('detail[tax_file_number]', isset($detail) ? $detail->tax_file_number : null) }}}" id="input_tax_file_number" name="detail[tax_file_number]" type="text" class="form-control quick-validate" data-targeturl="{{ URL::to('/tax-form/validate/tfn') }}">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[landline]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_landline" class="label-control {{ $error_class }}">Landline: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('detail[landline]', isset($detail) ? $detail->landline : null) }}}" id="input_landline" name="detail[landline]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[mobile]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_mobile" class="label-control">Mobile: </label>
                <input value="{{{ Input::old('detail[mobile]', isset($detail) ? $detail->mobile : null) }}}" id="input_mobile" name="detail[mobile]" type="text" class="form-control">
                {{ $error_msg }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[dob]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_dob" class="label-control">DOB:
                    <span title="date format. mm/dd/yyyy " data-placement="top" data-toggle="tooltip" class="fa fa-question-circle tooltip2" data-original-title="date format. mm/dd/yyyy "></span>
                </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('detail[dob]', isset($detail) ? db2dpicker($detail->dob) : null) }}}" id="input_dob" name="detail[dob]" type="text" class="form-control datetimepicker">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'detail[sex]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#" class="label-control">Sex</label>
                <div class="form-group-control">
                    <div class="btn-group radio-group">
                        <div type="button" class="btn btn-default radio">
                            <label>
                                <input checked="checked " {{ is_checked(Input::old('detail[sex]', isset($detail) ? $detail->sex : null), 'female') }} value="female" id="input_sex_female" name="detail[sex]"  type="radio">
                                Female
                            </label>
                        </div>
                        <div type="button" class="btn btn-default radio">
                            <label>
                                <input {{ is_checked(Input::old('detail[sex]', isset($detail) ? $detail->sex : null), 'male') }} value="male" id="input_sex_male" name="detail[sex]"  type="radio">
                                Male
                            </label>
                        </div>
                    </div>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="#" class="label-control">If your Spouse is completing their form on GYTBO, do you want us to link their account to yours?</label>
                <div class="btn-group checkbox-group">
                    <div type="button" class="btn btn-default checkbox">
                        <label><input {{ is_checked(Input::old('detail[link_spouse_account]', isset($detail) ? $detail->link_spouse_account : null), 1) }} value="1" name="detail[link_spouse_account]" type="radio"> Yes</label>
                    </div>
                    <div type="button" class="btn btn-default checkbox">
                        <label><input {{ is_checked(Input::old('detail[link_spouse_account]', isset($detail) ? $detail->link_spouse_account : null), 0) }} value="0" name="detail[link_spouse_account]" type="radio"> No</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <?php list($error_msg, $error_class) = validator_res($errors,'detail[is_australian_resident]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="" class="label-control">Are you an Australian Resident for Tax Purposes ?</label>
                <div class="form-group-control">
                    <div class="btn-group checkbox-group">
                        <div type="button" class="btn btn-default checkbox">
                            <label>
                                <input {{ is_checked(Input::old('detail[is_australian_resident]', isset($detail) ? $detail->is_australian_resident : null), 1) }} value="1" id="input_is_australian_resident_1" name="detail[is_australian_resident]"  type="radio">
                                Yes
                            </label>
                        </div>
                        <div type="button"  class="btn btn-default checkbox">
                            <label>
                                <input {{ is_checked(Input::old('detail[is_australian_resident]', isset($detail) ? $detail->is_australian_resident : null), 0) }} value="0" id="input_is_australian_resident_0" name="detail[is_australian_resident]" type="radio">
                                No
                            </label>
                        </div>
                    </div>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    