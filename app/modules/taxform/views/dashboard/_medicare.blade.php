
    @if (isset($family_status))
    <input type="hidden" name="medicare[id]" value="{{ $medicare->id }}">
    @endif


    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        These questions relate to the Medicare Levy and the Medicare Levy Surcharge
    </div>


    <div class="form-group form-group-l5">
        <h4>Medicare Levy Reduction or Exemption <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span></h4>
    </div>
    
    <?php list($error_msg, $error_class) = validator_res($errors,'medicare[exemption]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#input_exemption" class="label-control">Full 1.5% Levy Exemption No. of Days</label>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group-control">
                    <input value="{{{ Input::old('medicare[exemption]', isset($medicare) ? $medicare->exemption : null) }}}" id="input_exemption" name="medicare[exemption]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info mt-20px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        If you do not complete this item you may be charged the full Medicare Levy Surcharge.
    </div>

    <div class="form-group form-group-l5">
        <h4>Medicare Levy Surcharge <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span></p></h4>
    </div>

    
    
    <?php list($error_msg, $error_class) = validator_res($errors,'medicare[has_covered_pphc]') ?>
    <div class="form-group {{ $error_class }}">
        <label for="#" class="label-control">*For the whole tax period, were you and all your dependents and your Spouse covered by private patient hospital cover?</label>

        <div class="row">
            <div class="col-md-6">
                <div class="btn-group radio-group">
                    <div type="button" class="btn btn-default radio">
                        <label id="input_has_covered_pphc_1">
                            <input {{ is_checked(Input::old('medicare[has_covered_pphc]', isset($medicare) ? $medicare->has_covered_pphc : null), 1) }} value="1" id="input_has_covered_pphc_0" name="medicare[has_covered_pphc]" type="radio">
                            Yes
                        </label>
                    </div>
                    <div type="button" class="btn btn-default radio">
                        <label id="input_has_covered_pphc_0">
                            <input {{ is_checked(Input::old('medicare[has_covered_pphc]', isset($medicare) ? $medicare->has_covered_pphc : null), 0) }} value="0" id="input_has_covered_pphc_0" name="medicare[has_covered_pphc]"  type="radio">
                            No
                        </label>
                    </div>
                </div>
                {{ $error_msg }}
            </div>
        </div>
    </div>

   
    <?php list($error_msg, $error_class) = validator_res($errors,'medicare[levy_surcharge_no_days]') ?>

    <div class="form-group {{ $error_class }}">
        <label for="#input_levy_surcharge_no_days" class="label-control">If you answered NO please enter number of days you were NOT liable for the Medicare Levy Surcharge</label>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group-control">
                    <input value="{{{ Input::old('medicare[levy_surcharge_no_days]', isset($medicare) ? $medicare->levy_surcharge_no_days : null) }}}" id="input_levy_surcharge_no_days" name="medicare[levy_surcharge_no_days]" type="text" class="form-control">

                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
