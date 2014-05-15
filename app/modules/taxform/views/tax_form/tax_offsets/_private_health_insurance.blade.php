
<div id="private_health_insurance_{{  isset($private_health_insurance) ? $private_health_insurance->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'private_health_insurances.'.$index.'.health_fund_name') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_private_health_insurances_health_fund_name" class="label-control">Health Fund Name:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <select name="private_health_insurances[{{ $index }}][health_fund_name]" id="input_private_health_insurances_health_fund_name" class="form-control select2">
                    @foreach(Gy::getPHIHealthFundNames() as $key=>$value)
                    <option {{ is_selected( Input::old('private_health_insurances.'.$index.'.health_fund_name', isset($private_health_insurance) ? $private_health_insurance->health_fund_name : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                {{ $error_msg }}
            </div>
        </div>
        <div class="col-md-4">
            <?php list($error_msg, $error_class) = validator_res($errors,'private_health_insurances.'.$index.'.membership_no') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#private_health_insurances_membership_no" class="label-control">Membership No:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <input value="{{{ Input::old('private_health_insurances.'.$index.'.membership_no', isset($private_health_insurance) ? $private_health_insurance->membership_no : null) }}}" id="private_health_insurances_membership_no" name="private_health_insurances[{{ $index }}][membership_no]" type="text" class="form-control">
                {{ $error_msg }}
            </div>
        </div>
        <div class="col-md-2">
            <?php list($error_msg, $error_class) = validator_res($errors,'private_health_insurances.'.$index.'.benefit_code') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_private_health_insurances_benefit_code" class="label-control">Benefit Code:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <select name="private_health_insurances[{{ $index }}][benefit_code]" id="input_private_health_insurances_benefit_code" class="form-control select2">
                    @foreach(Gy::getPHIBenefitCodes() as $key=>$value)
                    <option {{ is_selected( Input::old('private_health_insurances.'.$index.'.benefit_code', isset($private_health_insurance) ? $private_health_insurance->benefit_code : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                {{ $error_msg }}
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'private_health_insurances.'.$index.'.type_of_coverage') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_private_health_insurances_type_of_coverage" class="label-control">Type of Coverage:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <select name="private_health_insurances[{{ $index }}][type_of_coverage]" id="input_private_health_insurances_type_of_coverage" class="form-control select2">
                    @foreach(Gy::getPHITypeOfCoverage() as $key=>$value)
                    <option {{ is_selected( Input::old('private_health_insurances.'.$index.'.type_of_coverage', isset($private_health_insurance) ? $private_health_insurance->type_of_coverage : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                {{ $error_msg }}
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'private_health_insurances.'.$index.'.tax_claim_code') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_private_health_insurances_tax_claim_code" class="label-control">Tax ClaimCode:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <select name="private_health_insurances[{{ $index }}][tax_claim_code]" id="input_private_health_insurances_tax_claim_code" class="form-control select2">
                    @foreach(Gy::getPHITaxClaimCode() as $key=>$value)
                    <option {{ is_selected( Input::old('private_health_insurances.'.$index.'.tax_claim_code', isset($private_health_insurance) ? $private_health_insurance->tax_claim_code : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                {{ $error_msg }}
            </div>
        </div>
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'private_health_insurances.'.$index.'.australian_government_rebate') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#private_health_insurances_australian_government_rebate" class="label-control">Your share of Australian Government Rebate:  </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('private_health_insurances.'.$index.'.australian_government_rebate', isset($private_health_insurance) ? $private_health_insurance->australian_government_rebate : null) }}}" id="private_health_insurances_australian_government_rebate" name="private_health_insurances[{{ $index }}][australian_government_rebate]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'private_health_insurances.'.$index.'.premiums_paid') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#private_health_insurances_premiums_paid" class="label-control">Your Share of Premiums Paid: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('private_health_insurances.'.$index.'.premiums_paid', isset($private_health_insurance) ? $private_health_insurance->premiums_paid : null) }}}" id="private_health_insurances_premiums_paid" name="private_health_insurances[{{ $index }}][premiums_paid]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>

        </div>
    </div>
</div>