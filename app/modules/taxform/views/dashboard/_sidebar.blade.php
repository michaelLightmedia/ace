<div class="t-sidebar">
    <div class="layout-l3 l3-2 ">
        <div class="form-group " autocomplete="off">
            <label for="#input_salutation" class="label-control">Tax Year: </label>
            <select  onchange="window.location='/dashboard/'+$(this).val()" name="tax_year" id="input_salutation" class="form-control select2">
                @foreach(TaxYear::getAllActive() as $row)
                <option {{ is_selected(isset($tax_year) ? $tax_year->year : "",$row->year); }} value="{{ $row->year }}">{{ $row->year }}</option>
                @endforeach
            </select>
        </div>

        <span class="label label-success">In Progress</span>
    </div>
</div>