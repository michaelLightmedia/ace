<?php


// Initiate the validator in laravel frameworks

// Australian Business Number
Validator::extend('tfn', function($attribute, $value, $parameters)
{
    // custom messages
    // ABN is too short (0 digits, expected 11).
    // ABN is too long (13 digits, expected 11).
    return ValidateAU::tfn($value);
});

// Australian Business Number
Validator::extend('abn', function($attribute, $value, $parameters)
{
    // custom messages
    // ABN is too short (0 digits, expected 11).
    // ABN is too long (13 digits, expected 11).
    return ValidateAU::abn($value);
});


// Australian Company Number (ACN)
Validator::extend('acn', function($attribute, $value, $parameters)
{
    // ACN is too short (2 digits, expected 9).
    // ACN is too long (13 digits, expected 9).
    // '010 499 966' is valid.
    return ValidateAU::acn($value);
});

// Australian Company Number (ACN)
Validator::extend('mn', function($attribute, $value, $parameters)
{
    // Medicare number is too short (5 digits, expected 11).
    // Medicare number is too long (23 digits, expected 11).
    // Individual Reference Number is missing.
    // '2428 77813 2/1' is valid.
    return ValidateAU::mn($value);
});

// Australian Company Number (ACN)
Validator::extend('mpn', function($attribute, $value, $parameters)
{
    // Provider number format is invalid.
    // '4024742F' is valid.
    return ValidateAU::mpn($value);
});

// Australian Company Number (ACN)
Validator::extend('postal_code', function($attribute, $value, $parameters)
{
    // Provider number format is invalid.
    // '4024742F' is valid.
    return ValidateAU::postalCode($value);
});


// Australian Company Number (ACN)
Validator::extend('terms_condition', function($attribute, $value, $parameters)
{
    // Provider number format is invalid.
    // '4024742F' is valid.
    return !empty($value) && $value == 1;
});

// Australian Company Number (ACN)
Validator::extend('password', function($attribute, $value, $parameters)
{
    // Provider number format is invalid.
    // '4024742F' is valid.
    return preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,16}$/', $value);
});

// Australian Company Number (ACN)
Validator::extend('money', function($attribute, $value, $parameters) {

    $plain_integer = parse_money($value);

    return preg_match('/^\$.+?[0-9]+(,[0-9]{3})*(.[0-9]{2})?$/', $value) && strlen( $plain_integer ) <= 8;
});

Validator::extend('login_email',function($attribute, $value, $parameters){
    return User::where('email','=',$value)->first() ? true : false;
});

Validator::extend('registration_not_in',function($attribute, $value, $parameters){
    return !in_array($value,$parameters);
});
Validator::extend('self_education_amount',function($attribute, $value, $parameters){
    $value = parse_money($value);
    return $value > 250;
});

Validator::extend('landline_and_mobile',function($attribute, $value, $parameters){
    return in_array($value,$parameters);
});

Validator::extend('uk_date',function($attribute, $value, $parameters){

    if ($value instanceof DateTime) return true;
    $value = str_replace('/','-',$value);

    if (strtotime($value) === false) return false;

    $date = date_parse($value);

    return checkdate($date['month'], $date['day'], $date['year']);
});

Validator::extend('uk_dob',function($attribute, $value, $parameters){

    if ($value instanceof DateTime) return true;

    $value = str_replace('/','-',$value);
    $value = strtotime($value);

    $curr_y = date('Y',time());
    $val_y = date('Y',$value);

    $range_from = $curr_y - 1000;
    $range_to = $curr_y + 1000;

    if ($val_y < $range_from || $val_y > $range_to) {
        return false;
    }

    return true ;
});
Validator::extend('uk_date_format',function($attribute, $value, $parameters){

    $value = str_replace('/','-',$value);


    $parsed = date_parse_from_format($parameters[0], $value);

    return $parsed['error_count'] === 0;

});
Validator::extend('uk_before',function($attribute, $value, $parameters){

    $value = str_replace('/','-',$value);
    $parameters[0] = str_replace('/','-',$parameters[0]);

    return strtotime($value) < strtotime($parameters[0]);

});
Validator::extend('uk_after',function($attribute, $value, $parameters){

    $value = str_replace('/','-',$value);
    $parameters[0] = str_replace('/','-',$parameters[0]);

    return strtotime($value) > strtotime($parameters[0]);

});



