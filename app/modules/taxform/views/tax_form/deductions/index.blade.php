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
                {{ Gy::system_messages() }}

            <header class="heading heading-l2 l2-2">
                <h1>Deductions</h1>
            </header>
            <div class="form form-l2">
                <ul class="list-inline nav nav-tabs">
                    <li class="active"><a class="tab" href="#car-expenses" data-toggle="tab">Car Expenses</a></li>
                    <li><a class="tab" href="#travel-expenses" data-toggle="tab">Travel Expenses</a></li>
                    <li><a class="tab" href="#uniform" data-toggle="tab">Uniform</a></li>
                    <li><a class="tab" href="#self-education" data-toggle="tab">Self Eduction</a></li>
                    <li><a class="tab" href="#other" data-toggle="tab">Other</a></li>
                </ul>
                <div class="form form-l2">
                    <div class="tab-content">

                        {{-- Car Expenses --}}
                        <div class="tab-pane active" id="car-expenses">
                            <form id="car_expenses_form" class="are_you_sure" method="POST" action="{{ url("/tax-form/deductions/car-expenses") }}" autocomplete="off" novalidate="novalidate">

                                {{ Gy::system_messages('car_expenses') }}

                                <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="next_process_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#travel-expenses') }}">
                                <input type="hidden" name="success_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#car-expenses') }}">

                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Car Expenses</h3>
                                        <!-- <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>                   -->
                                        <a href="#" id="add_car_expenses" class="add_field_item btn btn-bordered btn-sm btn-rounded">
                                            <span class="fa fa-plus"></span> Add New
                                        </a>
                                    </div>
                                    <div class="form-fieldset">
                                        @if (isset($car_expenses) && count($car_expenses) > 0)
                                            <?php $index = 0; ?>
                                            @foreach($car_expenses as $car_expense)
                                                @include('taxform::tax_form.deductions._car_expenses')
                                                <?php $index++; ?>
                                            @endforeach
                                        @else
                                            <?php $index = 0; ?>
                                            @include('taxform::tax_form.deductions._car_expenses')
                                        @endif
                                    </div>
                                    <div class="form-2cloned" style="display:none">
                                        <?php $index = 0; ?>
                                        @include('taxform::tax_form.deductions._car_expenses')
                                    </div>
                                </div>

                                <div class="form-group-actions">
                                    <a href="{{ URL::to("/tax-form/{$user_tax_year->id}/income") }}" class="btn btn-lg btn-green">Back<span class=""></span></a>
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
                        </div>



                        {{-- Travel Expenses --}}
                        <div id="travel-expenses" class="tab-pane">
                            <form id="travel_expenses_form" class="are_you_sure" method="POST" action="{{ url("/tax-form/deductions/travel-expenses") }}" autocomplete="off" novalidate="novalidate">

                                {{ Gy::system_messages('travel_expenses') }}

                                <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="next_process_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#uniform') }}">
                                <input type="hidden" name="success_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#travel-expenses') }}">

                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Travel Expenses</h3>
                                        <!-- <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>                   -->
                                        <a href="#" id="add_car_expenses" class="add_field_item btn btn-bordered btn-sm btn-rounded">
                                            <span class="fa fa-plus"></span> Add New
                                        </a>
                                    </div>
                                    <div class="form-fieldset">
                                        @if (isset($travel_expenses) && count($travel_expenses) > 0)
                                            <?php $index = 0; ?>
                                            @foreach($travel_expenses as $travel_expense)
                                                @include('taxform::tax_form.deductions._travel_expenses')
                                                <?php $index++; ?>
                                            @endforeach
                                        @else
                                            <?php $index = 0; ?>
                                            @include('taxform::tax_form.deductions._travel_expenses')
                                        @endif
                                    </div>
                                    <div class="form-2cloned" style="display:none">
                                        <?php $index = 0; ?>
                                        @include('taxform::tax_form.deductions._travel_expenses')
                                    </div>

                                </div>

                                
                                <div class="form-group-actions">
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
                        </div>


                        <div id="uniform" class="tab-pane">

                            {{-- Uniform --}}
                            <form id="uniforms_form" class="are_you_sure" method="POST" action="{{ url("/tax-form/deductions/uniforms") }}" autocomplete="off" novalidate="novalidate">

                            {{ Gy::system_messages('uniforms') }}

                            <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="next_process_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#self-education') }}">
                            <input type="hidden" name="success_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#uniform') }}">

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

                            <div class="form-group-actions">
                                <a href="a[href=#travel-expenses].tab" data-toggle="trigerrer" class="btn btn-lg btn-green">Back<span class=""></span></a>
                            
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
                        </div>


                        <div id="self-education" class="tab-pane">
                            {{-- Self Education --}}
                            <form id="self_education_form" class="are_you_sure" method="POST" action="{{ url("/tax-form/deductions/self-educations") }}" autocomplete="off" novalidate="novalidate">

                                {{ Gy::system_messages('self_education') }}
                                <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="next_process_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#other') }}">
                                <input type="hidden" name="success_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#self-education') }}">

                                <div class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Self Education</h3>
                                        <!-- <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>                   -->
                                        <a href="#" id="add_car_expenses" class="add_field_item btn btn-bordered btn-sm btn-rounded">
                                            <span class="fa fa-plus"></span> Add New
                                        </a>
                                    </div>
                                    <div class="form-fieldset">
                                        @if (isset($self_educations) && count($self_educations) > 0)
                                            <?php $index = 0; ?>
                                            @foreach($self_educations as $self_education)
                                                @include('taxform::tax_form.deductions._self_education')
                                                <?php $index++; ?>
                                            @endforeach
                                        @else
                                            <?php $index = 0; ?>
                                            @include('taxform::tax_form.deductions._self_education')
                                        @endif
                                    </div>
                                    <div class="form-2cloned" style="display:none">
                                        <?php $index = 0; ?>
                                        @include('taxform::tax_form.deductions._self_education')
                                    </div>
                                </div>

                                
                                <div class="form-group-actions">
                                    <a href="a[href=#uniform].tab" data-toggle="trigerrer" class="btn btn-lg btn-green">Back<span class=""></span></a>
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
                        </div>


                        <div id="other" class="tab-pane">
                            {{-- Other Deductions --}}
                            <form id="other_deduction_form" class="are_you_sure" method="POST" action="{{ url("/tax-form/deductions/other") }}" autocomplete="off" novalidate="novalidate">

                                {{ Gy::system_messages('other_deduction') }}
                                <input type="hidden" name="user_tax_year_id" value="{{ Session::get('user_tax_year_id') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="next_process_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/tax-offsets') }}">
                                <input type="hidden" name="success_url" value="{{ url('/tax-form/'.Session::get('user_tax_year_id').'/deductions#other') }}">

                                <div id="income-bank-interest" class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Gifts and Donation</h3>
                                        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                                        <a href="#" id="add_bank_interest" class="add_field_item btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
                                    </div>
                                    <div class="form-fieldset">
                                        {{-- Multiple Salary " $salary " --}}
                                        @if (isset($other_gift_donations) && $other_gift_donations)
                                            <?php $index = 0; ?>
                                            @foreach($other_gift_donations as $other_gift_donation)
                                            @include('taxform::tax_form.deductions._other_gift_donation')
                                            <?php $index++; ?>
                                            @endforeach
                                        {{-- Single Salary " $bank_interest "--}}
                                        @else
                                            <?php $index = 0; ?>
                                            @include('taxform::tax_form.deductions._other_gift_donation')
                                        @endif
                                    </div>
                                    <div class="form-2cloned">
                                        <?php $index = 0; ?>
                                        @include('taxform::tax_form.deductions._other_gift_donation')
                                    </div>
                                </div>

                                <div id="income-dividends" class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Dividend Deduction</h3>
                                        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                                        <a href="#" id="add_dividends" class="add_field_item btn btn-bordered btn-sm btn-rounded">
                                            <span class="fa fa-plus"></span> Add New
                                        </a>
                                    </div>
                                    <div class="form-fieldset">
                                        {{-- Multiple Salary " $salary " --}}
                                        @if (isset($other_dividend_deductions) && $other_dividend_deductions)
                                            <?php $index = 0; ?>
                                            @foreach($other_dividend_deductions as $other_dividend_deduction)
                                                @include('taxform::tax_form.deductions._other_dividend_deduction')
                                                <?php $index++; ?>
                                            @endforeach
                                        {{-- Single Salary " $bank_interest "--}}
                                        @else
                                            <?php $index = 0; ?>
                                            @include('taxform::tax_form.deductions._other_dividend_deduction')
                                        @endif
                                    </div>
                                    <div class="form-2cloned">
                                        <?php $index = 0; ?>
                                        @include('taxform::tax_form.deductions._other_dividend_deduction')
                                    </div>
                                </div>

                                <div id="income-other-income" class="section section-l8">
                                    <div class="section-heading">
                                        <h3>Other Deduction</h3>
                                        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                                        <a href="#" id="add_other_income" class="add_field_item btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
                                    </div>
                                    <div class="form-fieldset">
                                        {{-- Multiple Salary " $salary " --}}
                                        @if (isset($other_others) && $other_others)
                                            <?php $index = 0; ?>
                                            @foreach($other_others as $other_other)
                                                @include('taxform::tax_form.deductions._other_other')
                                                <?php $index++; ?>
                                            @endforeach
                                        {{-- Single Salary " $bank_interest "--}}
                                        @else
                                            <?php $index = 0; ?>
                                            @include('taxform::tax_form.deductions._other_other')
                                        @endif
                                    </div>
                                    <div class="form-2cloned">
                                        <?php $index = 0; ?>
                                        @include('taxform::tax_form.deductions._other_other')
                                    </div>
                                </div>

                                <div class="form-group-actions">
                                    <a href="a[href=#self-education].tab" data-toggle="trigerrer" class="btn btn-lg btn-green">Back<span class=""></span></a>
                                    <button type="submit" name="submit_action" value="save" class="btn_action btn btn-lg btn-primary">
                                        <i class="fa fa-spinner fa-spin"></i>
                                        <i class="fa fa-ok"></i>
                                        SAVE
                                    </button>
                                    <button type="submit" name="submit_action" value="save_continue" class="btn_action btn btn-lg btn-primary">
                                        <i class="fa fa-spinner fa-spin"></i>
                                        <i class="fa fa-ok"></i>
                                        Save and Continue
                                        <span class="fa fa-arrow-right"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="t-sidebar">
        @include('taxform::tax_form._refund_status')
        @include('taxform::tax_form.deductions._sidebar')
    </div>
</div>

<script>
    $(function(){
        $.taxform.deductions.init();
    });
</script>
@stop