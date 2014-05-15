
<div id="tax_salary_{{  isset($salary) ? $salary->id : null }}" class="form-item">
    <div class="row">

        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.payers_abn') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#tax_salary_payers_abn" class="label-control">Payer's ABN: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('tax_salary.'.$index.'.payers_abn', isset($salary) ? $salary->payers_abn : null) }}}" id="tax_salary_payers_abn" name="tax_salary[{{ $index }}][payers_abn]"  type="text" class="form-control quick-validate" data-targeturl="{{ URL::to('/tax-form/validate/abn') }}">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.payers_name') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#tax_salary_payers_name" class="label-control">Payer's Name</label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('tax_salary.'.$index.'.payers_name', isset($salary) ? $salary->payers_name : null) }}}" id="tax_salary_payers_name" name="tax_salary[{{ $index }}][payers_name]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.gross_salary') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#tax_salary_gross_salary" class="label-control">Gross Salary  <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span></label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('tax_salary.'.$index.'.gross_salary', isset($salary) ? $salary->gross_salary : null) }}}" id="tax_salary_gross_salary" name="tax_salary[{{ $index }}][gross_salary]"  type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.tax_withheld') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#tax_salary_tax_withheld" class="label-control">Tax Withheld</label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('tax_salary.'.$index.'.tax_withheld', isset($salary) ? $salary->tax_withheld : null) }}}" id="tax_salary_tax_withheld" name="tax_salary[{{ $index }}][tax_withheld]"  type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.fringe_benefits') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#tax_salary_fringe_benefits" class="label-control">Reportable Fringe Benefits</label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('tax_salary.'.$index.'.fringe_benefits', isset($salary) ? $salary->fringe_benefits : null) }}}" id="tax_salary_fringe_benefits" name="tax_salary[{{ $index }}][fringe_benefits]"  type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>     
    </div>
    <div class="row">      
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.allowance_amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#tax_salary_allowance_amount" class="label-control">Allowance Amount</label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('tax_salary.'.$index.'.allowance_amount', isset($salary) ? $salary->allowance_amount : null) }}}" id="tax_salary_allowance_amount" name="tax_salary[{{ $index }}][allowance_amount]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.lump_sum_amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#tax_salary_lump_sum_amount" class="label-control">Lump Sum Amount</label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('tax_salary.'.$index.'.lump_sum_amount', isset($salary) ? $salary->lump_sum_amount : null) }}}" id="tax_salary_lump_sum_amount" name="tax_salary[{{ $index }}][lump_sum_amount]" type="text" class="form-control ">
                    {{ $error_msg }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'tax_salary.'.$index.'.lump_sum_type') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_tax_salary_lump_sum_type" class="label-control">Type: </label>
                <div class="form-group-control">
                    <select name="tax_salary[{{ $index }}][lump_sum_type]" id="input_tax_salary_lump_sum_type" class="form-control select2">
                        @foreach(Gy::getLumpSumType() as $key=>$value)
                        <option {{ is_selected( Input::old('tax_salary.'.$index.'.lump_sum_type', isset($salary) ? $salary->lump_sum_type : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
