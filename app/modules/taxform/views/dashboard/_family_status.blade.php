
    @if (isset($family_status))
    <input type="hidden" name="family_status[id]" value="{{ $family_status->id }}">
    @endif
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'family_status[no_of_dependents]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_no_of_dependents" class="label-control">If you had dependents, please enter number</label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('family_status[no_of_dependents]', isset($family_status) ? $family_status->no_of_dependents : null) }}}" id="input_no_of_dependents" name="family_status[no_of_dependents]"  type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">

            <?php list($error_msg, $error_class) = validator_res($errors,'family_status[has_spouse]') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#" class="label-control">Did you have a spouse during the tax year?</label>
                <div class="btn-group checkbox-group">
                    <div type="button" class="btn btn-default checkbox">
                        <label> <input {{ is_checked(Input::old('family_status[has_spouse]', isset($family_status) ? $family_status->has_spouse : null), 1) }} checked="checked" id="input_has_spouse_1" name="family_status[has_spouse]" type="radio" value="1"> Yes</label>
                    </div>
                    <div type="button" class="btn btn-default checkbox">
                        <label><input {{ is_checked(Input::old('family_status[has_spouse]', isset($family_status) ? $family_status->has_spouse : null), 0) }} id="input_has_spouse_0" name="family_status[has_spouse]" type="radio" value="0"> No</label>
                    </div>
                </div>
                {{ $error_msg }}
            </div>
        </div>
    </div>

        <div id="has_spouse_wrapper" >
            <div class="section section-l8">
                <label for="#" class="label-control h4">If you had a Spouse for only part of the year, please enter the dates</label>
                <div class="row">
                    <div class="col-md-6">
                        <?php list($error_msg, $error_class) = validator_res($errors,'family_status[spouses_from]') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="#input_spouses_from" class="label-control">From:</label>
                            <div class="form-group-control">
                                <input value="{{{ Input::old('family_status[spouses_from]', isset($family_status) ? db2dpicker($family_status->spouses_from) : null) }}}"  id="input_spouses_from" name="family_status[spouses_from]" type="text" class="form-control datetimepicker datetimepicker-from">
                                {{ $error_msg }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php list($error_msg, $error_class) = validator_res($errors,'family_status[spouses_to]') ?>
                        <div class="form-group {{ $error_class }}">
                            <label for="#input_spouses_to" class="label-control">To:</label>
                            <div class="form-group-control">
                                <input value="{{{ Input::old('family_status[spouses_to]', isset($family_status) ? db2dpicker($family_status->spouses_to) : null) }}}"  id="input_spouses_to" name="family_status[spouses_to]" type="text" class="form-control datetimepicker datetimepicker-to">
                                {{ $error_msg }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php list($error_msg, $error_class) = validator_res($errors,'family_status[spouses_income]') ?>
                    <div class="form-group {{ $error_class }}">
                        <label for="#" clas s="label-control">Spouse's Income</label>
                        <div class="form-group-control form-group-currency">
                            <input value="{{{ Input::old('family_status[spouses_income]', isset($family_status) ? $family_status->spouses_income : null) }}}" id="input_spouses_income" name="family_status[spouses_income]" type="text" class="form-control">

                            {{ $error_msg }}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <?php list($error_msg, $error_class) = validator_res($errors,'family_status[spouses_dob]') ?>
                    <div class="form-group {{ $error_class }}">
                        <label for="#input_spouses_dob" class="label-control">Spouse's Date of Birth</label>
                        <div class="form-group-control">
                            <input value="{{{ Input::old('family_status[spouses_dob]', isset($family_status) ? db2dpicker($family_status->spouses_dob) : null) }}}" id="input_spouses_dob" name="family_status[spouses_dob]" type="text" class="form-control datetimepicker">
                            {{ $error_msg }}
                        </div>
                    </div>
                </div>
            </div>

            <?php list($error_msg, $error_class) = validator_res($errors,'family_status[link_spouse_account]') ?>
            <div class="form-group">
                <label for="#" class="label-control mt-10px">If your Spouse is completing their form on GYTBO, do you want us to link their account to yours?</label>
                <div class="btn-group checkbox-group">
                    <div type="button" class="btn btn-default checkbox">
                        <label><input {{ is_checked(Input::old('family_status[link_spouse_account]', isset($family_status) ? $family_status->link_spouse_account : null), 1) }} value="1" name="family_status[link_spouse_account]" type="radio"> Yes</label>
                    </div>
                    <div type="button" class="btn btn-default checkbox">
                        <label><input {{ is_checked(Input::old('family_status[link_spouse_account]', isset($family_status) ? $family_status->link_spouse_account : null), 0) }} value="0" name="family_status[link_spouse_account]" type="radio"> No</label>
                    </div>
                </div>
                {{ $error_msg }}
            </div>
        </div>
    

