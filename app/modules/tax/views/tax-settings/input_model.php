<?php list($error_msg, $error_class) = validator_res($errors,'tax_year') ?>
<div class="form-group  {{ $error_class }}">
    <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
        Tax Year
        <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
    </label>
    <div class="col-lg-8 col-md-7 col-sm-7">
        <div class="selectpicker-full">
            <select id="selectpicker select-gateway" class="form-control" name="tax_year">
                <?php foreach(TaxYear::all() as $tax_year): ?>
                    <option <?php is_selected(isset($cents_per_kilometre) ? $cents_per_kilometre->tax_year : "",$tax_year->year); ?> value="<?php echo $tax_year->year?>"><?php echo  $tax_year->year ?></option>
                <?php endforeach; ?>
            </select>
            {{ $error_msg }}
        </div>
    </div>
</div>


<?php list($error_msg, $error_class) = validator_res($errors,'cents_per_kilometre') ?>
<div class="form-group {{ $error_class }}">
    <label for="cents_per_kilometre" class="col-lg-4 col-sm-4 control-label">
        Taxable income from:
    </label>
    <div class="col-lg-8 col-md-7 col-sm-7">
        <input id="cents_per_kilometre" class=" form-control " type="text" name="cents_per_kilometre" value="{{{ Input::old('cents_per_kilometre', isset($cents_per_kilometre) ? $cents_per_kilometre->cents_per_kilometre : null) }}}" />
        {{ $error_msg }}
    </div>
</div>