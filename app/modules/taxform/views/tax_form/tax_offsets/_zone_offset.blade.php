<div id="zone_offset">
    <div class="row">
        <div class="form-group">
            <label for="#" class="col-md-3 label-control mt-10px">&nbsp;</label>
            <label for="#" class="col-md-4 label-control mt-10px">No. of Days</label>
            <label for="#" class="col-md-4 label-control mt-10px">Amount</label>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="#" class="col-md-3 label-control mt-10px">Zone A</label>

            <?php list($error_msg, $error_class) = validator_res($errors,'zone_offset[zone_a_days]') ?>
            <div class="col-md-4 form-group {{ $error_class  }}">
                <input value="{{{ Input::old('zone_offset[zone_a_days]', isset($zone_offset) ? $zone_offset->zone_a_days : null) }}}" id="zone_offset_zone_a_days" name="zone_offset[zone_a_days]" type="text" class="form-control">
                {{ $error_msg }}
            </div>

            <div class="col-md-4 form-group form-group-currency">
                <input disabled="disabled"  value="" data-target-value="{{ Gy::getZoneAmount('a') }}" type="text" class="form-control ">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="#" class="col-md-3 label-control mt-10px">Zone B</label>

            <?php list($error_msg, $error_class) = validator_res($errors,'zone_offset[zone_b_days]') ?>
            <div class="col-md-4 form-group {{ $error_class  }}">
                <input value="{{{ Input::old('zone_offset[zone_b_days]', isset($zone_offset) ? $zone_offset->zone_b_days : null) }}}" id="zone_offset_zone_b_days" name="zone_offset[zone_b_days]" type="text" class="form-control">
                {{ $error_msg }}
            </div>
            <div class="col-md-4 form-group form-group-currency">
                <input disabled="disabled"  value="" data-target-value="{{ Gy::getZoneAmount('b') }}" type="text" class="form-control ">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">

            <label for="#" class="col-md-3 label-control mt-10px">Special Zone A (X): </label>

            <?php list($error_msg, $error_class) = validator_res($errors,'zone_offset[zone_x_days]') ?>
            <div class="col-md-4 form-group {{ $error_class  }}">
                <input value="{{{ Input::old('zone_offset[zone_x_days]', isset($zone_offset) ? $zone_offset->zone_x_days : null) }}}" id="zone_offset_zone_x_days" name="zone_offset[zone_x_days]" type="text" class="form-control">
                {{ $error_msg }}
            </div>

            <div class="col-md-4 form-group form-group-currency">
                <input disabled="disabled"  value="" data-target-value="{{ Gy::getZoneAmount('x') }}" type="text" class="form-control ">
            </div>


        </div>
    </div>
    <div class="row">
        <div class="form-group">

            <label for="#" class="col-md-3 label-control mt-10px">Special Zone B (Y): </label>

            <?php list($error_msg, $error_class) = validator_res($errors,'zone_offset[zone_y_days]') ?>
            <div class="col-md-4 form-group {{ $error_class  }}">
                <input value="{{{ Input::old('zone_offset[zone_y_days]', isset($zone_offset) ? $zone_offset->zone_y_days : null) }}}" id="zone_offset_zone_y_days" name="zone_offset[zone_y_days]" type="text" class="form-control">
                {{ $error_msg }}
            </div>

            <div class="col-md-4 form-group form-group-currency">
                <input disabled="disabled"  value="" data-target-value="{{ Gy::getZoneAmount('y') }}" type="text" class="form-control ">
            </div>



        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="#" class="col-md-3 label-control mt-10px">Special Zone B (Y): </label>

            <?php list($error_msg, $error_class) = validator_res($errors,'zone_offset[zone_z_days]') ?>
            <div class="col-md-4 form-group {{ $error_class  }}">
                <input value="{{{ Input::old('zone_offset[zone_z_days]', isset($zone_offset) ? $zone_offset->zone_z_days : null) }}}" id="zone_offset_zone_z_days" name="zone_offset[zone_z_days]" type="text" class="form-control">
                {{ $error_msg }}
            </div>

            <div class="col-md-4 form-group form-group-currency">
                <input disabled="disabled"  value="" data-target-value="{{ Gy::getZoneAmount('z') }}" type="text" class="form-control ">
            </div>
        </div>
    </div>

</div>
