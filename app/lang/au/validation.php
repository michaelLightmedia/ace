<?php

$___ =  array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "The :attribute must be accepted.",
	"active_url"       => "The :attribute is not a valid URL.",
	"after"            => "The :attribute must be a date after :date.",
	"alpha"            => "The :attribute may only contain letters.",
	"alpha_dash"       => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"        => "The :attribute may only contain letters and numbers.",
	"array"            => "The :attribute must be an array.",
	"before"           => "The :attribute must be a date before :date.",
	"between"          => array(
		"numeric" => "The :attribute must be between :min - :max.",
		"file"    => "The :attribute must be between :min - :max kilobytes.",
		"string"  => "The :attribute must be between :min - :max characters.",
		"array"   => "The :attribute must have between :min - :max items.",
	),
	"confirmed"        => "The :attribute confirmation does not match.",
	"date"             => "The :attribute is not a valid date.",
	"date_format"      => "The :attribute does not match the format :format.",
	"different"        => "The :attribute and :other must be different.",
	"digits"           => "The :attribute must be :digits digits.",
	"digits_between"   => "The :attribute must be between :min and :max digits.",
	"email"            => "The :attribute format is invalid.",
	"exists"           => "The selected :attribute is invalid.",
	"image"            => "The :attribute must be an image.",
	"in"               => "The selected :attribute is invalid.",
	"integer"          => "The :attribute must be an integer.",
	"ip"               => "The :attribute must be a valid IP address.",
	"max"              => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"            => "The :attribute must be a file of type: :values.",
	"min"              => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"           => "The selected :attribute is invalid.",
	"numeric"          => "The :attribute must be a number.",
	"regex"            => "The :attribute format is invalid.",
	"required"         => "The :attribute field is required.",
	"required_if"      => "The :attribute field is required when :other is :value.",
	"required_with"    => "The :attribute field is required when :values is present.",
	"required_without" => "The :attribute field is required when :values is not present.",
	"same"             => "The :attribute and :other must match.",
	"size"             => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"           => "The :attribute has already been taken.",
	"url"              => "The :attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
|
	*/

	'custom' => array(

		//Login
		'login_accnt_not_active' 				=> 'Account is not yet active',
		'login_invalid_email_or_password' 	=> 'Wrong Email and password combination.',

		//registration
		'signup_invalid_code' 			=> 'Activation code is invalid!',


    ),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
        'other_income' => array(
            0 => array(
                'tax_withheld' => 'Tax Withheld',
            )
        ),
        'help' => array(
            'has_help_debt' => 'Has Help Debt',
            'help_debt_amount' => 'Help Debt Amount',
        ),
        'zone_offset' => array(
            'zone_a_days' => 'A Zone days',
            'zone_a_amount' => 'A Zone amount',
            'zone_b_days' => 'B Zone Days',
            'zone_b_amount' => 'B Zone Amount',
            'zone_x_days' => 'Other Zone Days',
            'zone_x_amount' => 'Other Zone Amount',
            'zone_y_days' => 'Other Zone Days',
            'zone_y_amount' => 'Other Zone Amount',
            'zone_z_days' => 'Other Zone Days',
            'zone_z_amount' => 'Other Zone Amount',
        ),
        'detail' =>array (
            'id' => 'Detail ID',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'occupation' => 'Occupation',
            'salutation' => 'Salutation',
            'tax_file_number' => 'Tax File Number(TFN)',
            'landline' => 'Landline',
            'dob' => 'Date of Birth',
            'link_spouse_account' => 'Link Spouse Account',
            'is_australian_resident' => 'Is Australian Resident',
            'sex' => 'Sex',
        ),
        'address' =>array (
            'id' => 'Address ID',
            'postal_address_1' => "Postal Address 1",
            'postal_address_2' => "Postal Address 2",
            'postal_post_code' => 'Postal Post Code',
            'postal_suburb' => 'Postal Suburb',
            'postal_state' => 'Postal State',
            'home_address_1' => 'Home Address 1',
            'home_address_2' => 'Home Address 2',
            'home_post_code' => 'Home Post Code',
            'home_suburb' => 'Home Suburb',
            'home_state' => 'Home State',
        ),
        'family_status' =>array (
            'id' => 'Family Status ID',
            'no_of_dependents' => 'No of Dependents',
            'has_spouse' => 'Has Spouse',
            'spouses_from' => 'Spouses From',
            'spouses_to' => 'Spouses To',
            'spouses_income' => 'Spouses Income',
            'spouses_dob' => 'Spouses Date of Birth',
            'link_spouse_account' => 'Link Spouse Acount',
        ),
        'medicare' => array (
            'id' => 'Medicare ID',
            'exemption' => 'Exemption',
            'has_covered_pphc' => 'Has Covered PPHC',
            'levy_surcharge_no_days' => 'Levy Surcharge No Days',
        ),
    ),
    'terms_condition'             => 'Please Accept Terms and Conditions to Proceed',
    'password'                      => 'Password must contain 8-16, a combination of letters or numbers with atleast one letter and one number',

    'login_email'           => 'No account found for this email.', //' Sign up for <a href="'.url('/signup').'">Gytbo</a>.',
    'tfn' => 'Tax file number is invalid. Tax file number should only contains 9 number.',
    'abn' => 'ABN is invalid.',
    'postal_code' => 'Postal code is invalid.',
    'registration_not_in' => 'Registration code is already in used. Please provide another registration number.',
    'self_education_amount' => 'Deductible amount must be greater than $250.',
    'money' => 'The :attribute field must contain a price value.',
    'uk_dob' => 'The :attribute field must be a valid birth date.',
    'required_landline_mobile' => 'Landline or Mobile Required.',

    "uk_before"           => "The :attribute must be a date before :date.",
    "uk_after"            => "The :attribute must be a date after :date.",
    "uk_date_format"      => "The :attribute does not match the format :format.",
    "uk_date"             => "The :attribute is not a valid date."

);

// Add custom attributes name based on the get param (intended for arrays)
// Salary Input
if (Input::has('tax_salary') && is_array(Input::get('tax_salary'))) {
    // The Input
    foreach(Input::get('tax_salary') as $key=>$value) {
        $___['attributes']['tax_salary'][$key]['payers_abn'] = 'Payers ABN';
        $___['attributes']['tax_salary'][$key]['payers_name'] = 'Payers Name';
        $___['attributes']['tax_salary'][$key]['gross_salary'] = 'gross salary';
        $___['attributes']['tax_salary'][$key]['tax_withheld'] = 'tax withheld';
        $___['attributes']['tax_salary'][$key]['fringe_benefits'] = 'fringe benefits';
        $___['attributes']['tax_salary'][$key]['allowance_amount'] = 'allowance amount';
        $___['attributes']['tax_salary'][$key]['lump_sum_amount'] = 'lump sum amount';
        $___['attributes']['tax_salary'][$key]['lump_sum_type'] = 'Lump sum type';
    }
}

if (Input::has('bank_interest') && is_array(Input::get('bank_interest'))) {
    // The Input
    foreach(Input::get('bank_interest') as $key=>$value) {
        $___['attributes']['bank_interest'][$key]['bank'] = 'Bank';
        $___['attributes']['bank_interest'][$key]['interest'] = 'Interest';
        $___['attributes']['bank_interest'][$key]['tax_withheld'] = 'Tax withheld';
    }
}

if (Input::has('dividend') && is_array(Input::get('bank_interest'))) {
    // The Input
    foreach(Input::get('dividend') as $key=>$value) {
        $___['attributes']['dividend'][$key]['company'] = 'Company';
        $___['attributes']['dividend'][$key]['unfranked_divident'] = 'Unfranked Divident';
        $___['attributes']['dividend'][$key]['franked_divident'] = 'Franked divident';
        $___['attributes']['dividend'][$key]['franking_credit'] = 'Franking credit';
        $___['attributes']['dividend'][$key]['tax_withheld'] = 'Tax withheld';
    }
}

if (Input::has('other_income') && is_array(Input::get('other_income'))) {
    // The Input
    foreach(Input::get('other_income') as $key=>$value) {
        $___['attributes']['other_income'][$key]['income_type_guid'] = 'Income Type';
        $___['attributes']['other_income'][$key]['description'] = 'Description';
        $___['attributes']['other_income'][$key]['amount'] = 'Amount';
        $___['attributes']['other_income'][$key]['tax_withheld'] = 'Tax withheld';
    }
}

if (Input::has('car_expenses') && is_array(Input::get('car_expenses'))) {
    // The Input
    foreach(Input::get('car_expenses') as $key=>$value) {
        $___['attributes']['car_expenses'][$key]['registration'] = 'Registration';
        $___['attributes']['car_expenses'][$key]['cents_per_kilometre_id'] = 'Cents Per Kilometere';
        $___['attributes']['car_expenses'][$key]['business_kilometre'] = 'Business Kilometre';
        $___['attributes']['car_expenses'][$key]['total_expenses'] = 'Total Expenses';
        $___['attributes']['car_expenses'][$key]['business_percentage'] = 'Business Percentage';
        $___['attributes']['car_expenses'][$key]['car_purchase_date'] = 'Car Purchase Date';
        $___['attributes']['car_expenses'][$key]['car_purchase_amount'] = 'Car Purchase Amount';
    }
}

if (Input::has('travel_expenses') && is_array(Input::get('travel_expenses'))) {
    // The Input
    foreach(Input::get('travel_expenses') as $key=>$value) {
        $___['attributes']['travel_expenses'][$key]['description'] = 'Description';
        $___['attributes']['travel_expenses'][$key]['amount'] = 'Amount';
    }
}

if (Input::has('uniforms') && is_array(Input::get('uniforms'))) {
    // The Input
    foreach(Input::get('uniforms') as $key=>$value) {
        $___['attributes']['uniforms'][$key]['description'] = 'Description';
        $___['attributes']['uniforms'][$key]['amount'] = 'Amount';
    }
}

if (Input::has('self_educations') && is_array(Input::get('self_educations'))) {
    // The Input
    foreach(Input::get('self_educations') as $key=>$value) {
        $___['attributes']['self_educations'][$key]['education_expenses'] = 'Education Expenses';
        $___['attributes']['self_educations'][$key]['amount'] = 'Amount';
        $___['attributes']['self_educations'][$key]['type'] = 'Type';
    }
}

if (Input::has('private_health_insurances') && is_array(Input::get('private_health_insurances'))) {
    // The Input
    foreach(Input::get('private_health_insurances') as $key=>$value) {
        $___['attributes']['private_health_insurances'][$key]['health_fund_name'] = 'Health Fund Name';
        $___['attributes']['private_health_insurances'][$key]['membership_no'] = 'Membership No. ';
        $___['attributes']['private_health_insurances'][$key]['benefit_code'] = 'Benefit Code';
        $___['attributes']['private_health_insurances'][$key]['type_of_coverage'] = 'Type of Coverage';
        $___['attributes']['private_health_insurances'][$key]['tax_claim_code'] = 'Tax Claim Code';
        $___['attributes']['private_health_insurances'][$key]['australian_government_rebate'] = 'Australian Government Rebate';
        $___['attributes']['private_health_insurances'][$key]['premiums_paid'] = 'Premiums Paid';
    }
}
if (Input::has('offset_rate_base_levels') && is_array(Input::get('offset_rate_base_levels'))) {
    // The Input
    foreach(Input::get('offset_rate_base_levels') as $key=>$value) {
        $___['attributes']['offset_rate_base_levels'][$key]['level_from'] = 'Age from';
        $___['attributes']['offset_rate_base_levels'][$key]['level_to'] = 'Age to';
        $___['attributes']['offset_rate_base_levels'][$key]['offset_rate'] = 'Offset Code';
    }
}



return $___;

