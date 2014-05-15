
<div class="item-level">
    <div class="form-group">
        <label class="col-lg-4 col-sm-4 control-label" for="exampleInputEmail2">Age</label>
        <div class="col-lg-8 col-md-7 col-sm-7">
            <div class="row">
                <?php list($error_msg, $error_class) = validator_res($errors,"offset_rate_base_levels.{$index}.level_from") ?>
                <div class="col-md-6 {{ $error_class }}">
                    <input name="offset_rate_base_levels[{{ $index }}][level_from]" value="{{{ Input::old("offset_rate_base_levels.{$index}.level_from", isset($base_level) ? $base_level->level_from : null ) }}}" type="text" class="form-control"  placeholder="From">
                     {{ $error_msg }}
                </div>
                <?php list($error_msg, $error_class) = validator_res($errors,"offset_rate_base_levels.{$index}.level_to") ?>
                <div class="col-md-6 {{ $error_class }}">
                    <input name="offset_rate_base_levels[{{ $index }}][level_to]" value="{{{ Input::old("offset_rate_base_levels.{$index}.level_to", isset($base_level) ? $base_level->level_to : null ) }}}" type="text" class="form-control"  placeholder="To">
                    {{ $error_msg }}
                </div>
            </div>
        </div>
    </div>
    <?php list($error_msg, $error_class) = validator_res($errors,"offset_rate_base_levels.{$index}.offset_rate") ?>
    <div class="form-group {{ $error_class }}">
        <label class="col-lg-4 col-sm-4 control-label" for="exampleInputPassword2">Rate: </label>
        <div class="col-lg-8 col-md-7 col-sm-7">
            <input name="offset_rate_base_levels[{{ $index }}][offset_rate]" value="{{{ Input::old("offset_rate_base_levels.{$index}.offset_rate", isset($base_level) ? $base_level->offset_rate : null ) }}}" type="text" class="form-control"  placeholder="Rate">
            {{ $error_msg }}
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-4 col-sm-4 control-label" for="">&nbsp;</label>
        <div class="col-lg-8 col-md-7 col-sm-7">
            <a id="remove_base_level" href="#" class="btn btn-sm btn-warning"><span class="fa fa-times"></span> Remove</a>
        </div>
    </div>

    <hr />
</div>