@extends('layouts.tax_form')

@section('content')

<div class="banner banner-process">
    <span class="itp-rocket"></span>
    <span class="itp-satellite"></span>

</div>

<div class="container-fluid container-l2">

    <div class="t-content">

    @include('taxform::tax_form._process_steps')

        <div class="section section-l7">
            <form class="are_you_sure" id="income_form" method="POST" action="#" autocomplete="off" novalidate="novalidate">

                <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="next_process_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions') }}">
                <input type="hidden" name="success_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/income') }}">

                <header class="heading heading-l2">
                    <h1>Income</h1>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Please provide the following information as it appears in your PAYG income statement - Individual Non-Business
                    </div>

                    {{ Gy::system_messages("income") }}
                </header>

                <div class="form form-l2">
                    <div id="income-salary" class="section section-l8">
                        <div class="section-heading">
                            <h3>Salary</h3>
                            <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                            <a href="#" id="add_salary" class="add_field_item btn btn-bordered btn-sm btn-rounded">
                                <span class="fa fa-plus"></span> Add New
                            </a>
                        </div>

                        <div class="form-fieldset fieldset-exclude-first">
                            {{-- Multiple Salary " $salary " --}}
                            @if (isset($salaries) && count($salaries) > 0)

                                <?php $index = 0; ?>
                                @foreach($salaries as $salary)
                                    @include('taxform::tax_form.income._salary')
                                    <?php $index++; ?>
                                @endforeach

                            {{-- Single Salary " $salary "--}}
                            @else
                                <?php $index = 0; ?>
                                @include('taxform::tax_form.income._salary')
                            @endif
                        </div>
                        <div class="form-2cloned" style="display:none">
                            <?php $index = 0; ?>
                            @include('taxform::tax_form.income._salary')
                        </div>
                    </div>

                    <div id="income-bank-interest" class="section section-l8">
                        <div class="section-heading">
                            <h3>Bank Interest</h3>
                            <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                            <a href="#" id="add_bank_interest" class="add_field_item btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
                        </div>
                        <div class="form-fieldset">
                            {{-- Multiple Salary " $salary " --}}
                            @if (isset($bank_interests) && $bank_interests)
                                <?php $index = 0; ?>
                                @foreach($bank_interests as $bank_interest)
                                    @include('taxform::tax_form.income._bank_interests')
                                    <?php $index++; ?>
                                @endforeach

                            {{-- Single Salary " $bank_interest "--}}
                            @else
                                <?php $index = 0; ?>
                                @include('taxform::tax_form.income._bank_interests')
                            @endif
                        </div>
                        <div class="form-2cloned">
                            <?php $index = 0; ?>
                            @include('taxform::tax_form.income._bank_interests')
                        </div>
                    </div>

                    <div id="income-dividends" class="section section-l8">
                        <div class="section-heading">
                            <h3>Dividends</h3>
                            <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                            <a href="#" id="add_dividends" class="add_field_item btn btn-bordered btn-sm btn-rounded">
                                <span class="fa fa-plus"></span> Add New
                            </a>
                        </div>
                        <div class="form-fieldset">
                            {{-- Multiple Salary " $salary " --}}
                            @if (isset($dividends) && $dividends)
                                <?php $index = 0; ?>
                                @foreach($dividends as $dividend)
                                    @include('taxform::tax_form.income._dividends')
                                    <?php $index++; ?>
                                @endforeach
                            {{-- Single Salary " $bank_interest "--}}
                            @else
                                <?php $index = 0; ?>
                                @include('taxform::tax_form.income._dividends')
                            @endif
                        </div>
                        <div class="form-2cloned">
                            <?php $index = 0; ?>
                            @include('taxform::tax_form.income._dividends')
                        </div>
                    </div>

                    <div id="income-other-income" class="section section-l8">
                        <div class="section-heading">
                            <h3>Other Income</h3>
                            <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                            <a href="#" id="add_other_income" class="add_field_item btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
                        </div>
                        <div class="form-fieldset">
                            {{-- Multiple Salary " $salary " --}}
                            @if (isset($other_incomes) && $other_incomes)
                                <?php $index = 0; ?>
                                @foreach($other_incomes as $other_income)
                                    @include('taxform::tax_form.income._other_income')
                                    <?php $index++; ?>
                                @endforeach
                            {{-- Single Salary " $bank_interest "--}}
                            @else
                                <?php $index = 0; ?>
                                @include('taxform::tax_form.income._other_income')
                            @endif
                        </div>
                        <div class="form-2cloned">
                            <?php $index = 0; ?>
                            @include('taxform::tax_form.income._other_income')
                        </div>
                    </div>

                    <div class="form-group-actions">
                        <a href="{{ URL::to("/dashboard/{$user_tax_year->tax_year}") }}" class="btn btn-lg btn-green">Back<span class=""></span></a>
                        <button type="submit" name="submit_and_save" value="1" class="btn_action btn btn-lg btn-primary">
                            <i class="fa fa-spinner fa-spin"></i>
                            <i class="fa fa-ok"></i>
                            SAVE
                        </button>
                        <button type="submit" name="submit_and_continue" value="1" class="btn_action btn btn-lg btn-primary">
                            <i class="fa fa-spinner fa-spin"></i>
                            <i class="fa fa-ok"></i>
                            Save and Continue
                            <span class="fa fa-arrow-right"></span>
                        </button>
                    </div>

                </div>
            </form> <!-- /#income_form -->
        </div>

    </div>

    <div class="t-sidebar">
        @include('taxform::tax_form._refund_status')
        @include('taxform::tax_form.income._sidebar')
    </div>
</div>

<script>
    $(function(){
        $.taxform.income.init();
    });
</script>
@stop