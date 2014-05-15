<div id="tax_uniform_{{  isset($uniform) ? $uniform->id : null }}" class="form-item">
    <div class="row">
        <div class="col-md-9">
            <?php list($error_msg, $error_class) = validator_res($errors,'uniforms.'.$index.'.description') ?>
            <div class="form-group {{ $error_class }}">
                <label for="#input_uniforms_description" class="label-control">Description:
                    <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                </label>
                <div class="form-group-control">
                    <select name="uniforms[{{ $index }}][description]" id="input_uniforms_description" class="form-control select2">
                        @foreach(Gy::getUniformDescription() as $key=>$value)
                        <option {{ is_selected( Input::old('uniforms.'.$index.'.description', isset($uniform) ? $uniform->description : null),$key) }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {{ $error_msg }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php list($error_msg, $error_class) = validator_res($errors,'uniforms.'.$index.'.amount') ?>
            <div class="form-group {{ $error_class  }}">
                <label for="#uniforms_amount" class="label-control">Amount: </label>
                <div class="form-group-control form-group-currency">
                    <input value="{{{ Input::old('uniforms.'.$index.'.amount', isset($uniform) ? $uniform->amount : null) }}}" id="uniforms_amount" name="uniforms[{{ $index }}][amount]" type="text" class="form-control">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
</div>