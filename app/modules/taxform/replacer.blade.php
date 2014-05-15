{{-- Uniform --}}
<form id="uniforms_form" class="are_you_sure" method="POST" action="{{ url("/tax-form/deductions/travel-expenses") }}" autocomplete="off">

<div id="uniforms_form_message"></div>
<input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
<input type="hidden" name="next_process" value="a[href=#uniform]">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="section section-l8">
    <div class="section-heading">
        <h3>Uniform</h3>
        <!-- <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>                   -->
        <a href="#" id="add_car_expenses" class="add_field_item btn btn-bordered btn-sm btn-rounded">
            <span class="fa fa-plus"></span> Add New
        </a>
    </div>
    <div class="form-fieldset">
        @if (isset($uniforms) && count($uniforms) > 0)
        <?php $index = 0; ?>
        @foreach($uniforms as $uniform)
        @include('taxform::tax_form.deductions._uniform')
        <?php $index++; ?>
        @endforeach
        @else
        <?php $index = 0; ?>
        @include('taxform::tax_form.deductions._uniform')
        @endif
    </div>
    <div class="form-2cloned" style="display:none">
        <?php $index = 0; ?>
        @include('taxform::tax_form.deductions._uniform')
    </div>

</div>


<div class="form-group-actions ">
    <a href="a[href=#car-expenses].tab" data-toggle="trigerrer" class="btn btn-lg btn-green">Back<span class=""></span></a>
    <button type="submit" name="submit_action" value="save" class="btn_action btn btn-lg btn-primary">
        <i class="fa fa-spinner fa-spin"></i>
        <i class="fa fa-ok"></i>
        Save
    </button>
    <button type="submit" name="submit_action" value="save_continue" class="btn_action btn btn-lg btn-primary">
        <i class="fa fa-spinner fa-spin"></i>
        <i class="fa fa-ok"></i>
        Save and Next
    </button>
</div>
</form>