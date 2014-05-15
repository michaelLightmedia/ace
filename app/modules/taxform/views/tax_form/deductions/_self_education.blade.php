<div id="tax_self_education_{{  isset($self_education) ? $self_education->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-6">
            <?php list($error_msg, $error_class) = validator_res($errors,'self_educations.'.$index.'.education_expenses') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#self_educations_education_expenses" class="label-control">Deductible Education Expenses: </label>
                <div class="form-group-control">
                    <input value="{{{ Input::old('self_educations.'.$index.'.education_expenses', isset($self_education) ? $self_education->education_expenses : null) }}}" id="self_educations_education_expenses" name="self_educations[{{ $index }}][education_expenses]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'self_educations.'.$index.'.amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#self_educations_amount" class="label-control">Amount: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('self_educations.'.$index.'.amount', isset($self_education) ? $self_education->amount : null) }}}" id="self_educations_amount" name="self_educations[{{ $index }}][amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'self_educations.'.$index.'.type') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_self_educations_type" class="label-control">Type:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <div class="form-group-control">
                    <select name="self_educations[{{ $index }}][type]" id="input_self_educations_type" class="form-control select2">
                        @foreach(Gy::getSelfEducationType() as $key=>$value)
                        <option {{ is_selected( Input::old('self_educations.'.$index.'.type', isset($self_education) ? $self_education->type : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>
