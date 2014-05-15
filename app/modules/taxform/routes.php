<?php


Route::group(array('before' => 'auth|users_can_file_tax_form'), function(){


    // Bind Database Object
    Route::bind('tax_year',function($value, $route) {

        // We need to check if user id and the year selected is
        // valid, else create it and return
        if ( empty($value) ) {
            $tax_year = TaxYear::orderBy('year','asc')->first();
        } else {
            $tax_year = TaxYear::find($value);

            if (!$tax_year) {
                App::abort('404');
            }
        }

        if ($tax_year) {

            // Check if user has already been having the form for the tax year
            // if not, create tax year relations
            $is_tax_user_found = UserTaxYear::where('user_id','=',Auth::user()->id)
                ->where('tax_year','=',$tax_year->year)
                ->first();

            if (!$is_tax_user_found) {
                $user_tax_year = new UserTaxYear();
                $user_tax_year->user_id = Auth::user()->id;
                $user_tax_year->tax_year = $tax_year->year;
                $user_tax_year->status = UserTaxYear::STATUS_IN_PROGRESS;
                $user_tax_year->estimate_refund = 0.000;
                $user_tax_year->currency_code = get_settings('payment_currency');
                $user_tax_year->save();

                $user_tax_year->createHooksMeta();
            } else {
                $user_tax_year = $is_tax_user_found;
            }

            // Set to session the current picked tax year
            Session::put('user_tax_year_id',$user_tax_year->id);

            return $tax_year;
        } else {
            App::abort('404');
        }
    });

    Route::bind('user_tax_year', function($value, $route) {
        $user_tax_year = UserTaxYear::find($value);

        if ($user_tax_year ) {
            if ($user_tax_year->user_id == Auth::user()->id || can('manage_tax')) {
                return $user_tax_year;
            }

            App::abort('403');
        } else {
            App::abort('404');
        }

    });


    // Validate
    Route::get('dashboard/{tax_year?}','App\Modules\TaxForm\TaxFormController@getIndex');

    // Post Dashboard Details
    Route::post('dashboard','App\Modules\TaxForm\TaxFormController@postIndex');

    // Get Data
    Route::group(array('prefix'=>'tax-form'),function(){

        Route::get('validate/tfn','App\Modules\TaxForm\TaxFormController@getValidateTfn');
        Route::get('validate/abn','App\Modules\TaxForm\TaxFormController@getValidateAbn');

        Route::get('{tax_year}/personal-details','App\Modules\TaxForm\TaxFormController@getPersonalDetails');
        Route::get('{tax_year}/address','App\Modules\TaxForm\TaxFormController@getAddress');
        Route::get('{tax_year}/family-status','App\Modules\TaxForm\TaxFormController@getFamilyStatus');
        Route::get('{tax_year}/medicare','App\Modules\TaxForm\TaxFormController@getMedicare');

        Route::get('{user_tax_year}/income','App\Modules\TaxForm\TaxFormIncomeController@getIndex');
        Route::post('{user_tax_year}/income','App\Modules\TaxForm\TaxFormIncomeController@postIndex');

        Route::get('{user_tax_year}/deductions','App\Modules\TaxForm\TaxFormDeductionController@getIndex');

        Route::get('{user_tax_year}/tax-offsets','App\Modules\TaxForm\TaxFormZoneOffsetController@getIndex');

        Route::get('{user_tax_year}/summary','App\Modules\TaxForm\TaxFormSummaryController@getIndex');

        Route::get('{user_tax_year}/payment','App\Modules\TaxForm\TaxFormPaymentController@getIndex');

    });

    // note . type, vid, nid, title, language, status, uid,created,changed

    // Post Data
    Route::group(array('before' => 'csrf','prefix'=>'tax-form'),function(){

        Route::post('/deductions/car-expenses','App\Modules\TaxForm\TaxFormDeductionController@postCarExpenses');
        Route::post('/deductions/travel-expenses','App\Modules\TaxForm\TaxFormDeductionController@postTravelExpenses');
        Route::post('/deductions/uniforms','App\Modules\TaxForm\TaxFormDeductionController@postUniform');
        Route::post('/deductions/self-educations','App\Modules\TaxForm\TaxFormDeductionController@postSelfEducation');
        Route::post('/deductions/other','App\Modules\TaxForm\TaxFormDeductionController@postOther');

        Route::post('/tax-offsets','App\Modules\TaxForm\TaxFormZoneOffsetController@postIndex');

    });


    // Ajax Information for tax form helper
    // Direct functions


});


