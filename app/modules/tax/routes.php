<?php 
Route::group(array('before' => 'auth'), function(){
	//General Settings
    Route::model('tax_year','\TaxYear');
    Route::model('tax_mls','\TaxMLS');
    Route::model('tax_rate','\TaxRate');
    Route::model('help_rate','\HelpRate');
    Route::model('offset_rate','\OffsetRate');
    Route::model('cents_per_kilometre','\CentsPerKilometre');

    Route::get('admin/tax-form','App\Modules\Tax\TaxFormController@getIndex')->before('manage_settings_permission');

    Route::group(array('prefix' => 'admin/tax-form/settings'),function(){

        //Payment Settings

        Route::get('payment', 'App\Modules\Tax\TaxSettingsController@getPayment')->before('manage_settings_permission');
        Route::post('payment', 'App\Modules\Tax\TaxSettingsController@postPayment')->before('manage_settings_permission');


        // Tax Year

        Route::get('tax-years', 'App\Modules\Tax\TaxYearController@getIndex')->before('manage_tax_permission');
        Route::get('tax-years', 'App\Modules\Tax\TaxYearController@getIndex')->before('manage_tax_permission');

        Route::get('tax-years/create', 'App\Modules\Tax\TaxYearController@getCreate')->before('manage_tax_permission');
        Route::post('tax-years/create', 'App\Modules\Tax\TaxYearController@postCreate')->before('manage_tax_permission');

        Route::get('tax-years/{tax_year}/delete', 'App\Modules\Tax\TaxYearController@getDelete')->before('manage_tax_permission');
        Route::post('tax-years/{tax_year}/delete', 'App\Modules\Tax\TaxYearController@postDelete')->before('manage_tax_permission');

        Route::get('tax-years/{tax_year}/edit', 'App\Modules\Tax\TaxYearController@getEdit')->before('manage_tax_permission');
        Route::post('tax-years/{tax_year}/edit', 'App\Modules\Tax\TaxYearController@postEdit')->before('manage_tax_permission');


        // Tax MLS

        Route::get('tax-mls', 'App\Modules\Tax\TaxMLSController@getIndex')->before('manage_tax_permission');
        Route::get('tax-mls/create', 'App\Modules\Tax\TaxMLSController@getCreate')->before('manage_tax_permission');
        Route::post('tax-mls/create', 'App\Modules\Tax\TaxMLSController@postCreate')->before('manage_tax_permission');

        Route::get('tax-mls/{tax_mls}/delete', 'App\Modules\Tax\TaxMLSController@getDelete')->before('manage_tax_permission');
        Route::post('tax-mls/{tax_mls}/delete', 'App\Modules\Tax\TaxMLSController@postDelete')->before('manage_tax_permission');

        Route::get('tax-mls/{tax_mls}/edit', 'App\Modules\Tax\TaxMLSController@getEdit')->before('manage_tax_permission');
        Route::post('tax-mls/{tax_mls}/edit', 'App\Modules\Tax\TaxMLSController@postEdit')->before('manage_tax_permission');


        // Tax Rates

        Route::get('tax-rates', 'App\Modules\Tax\TaxRateController@getIndex')->before('manage_tax_permission');
        Route::get('tax-rates/create', 'App\Modules\Tax\TaxRateController@getCreate')->before('manage_tax_permission');
        Route::post('tax-rates/create', 'App\Modules\Tax\TaxRateController@postCreate')->before('manage_tax_permission');

        Route::get('tax-rates/{tax_rate}/delete', 'App\Modules\Tax\TaxRateController@getDelete')->before('manage_tax_permission');
        Route::post('tax-rates/{tax_rate}/delete', 'App\Modules\Tax\TaxRateController@postDelete')->before('manage_tax_permission');

        Route::get('tax-rates/{tax_rate}/edit', 'App\Modules\Tax\TaxRateController@getEdit')->before('manage_tax_permission');
        Route::post('tax-rates/{tax_rate}/edit', 'App\Modules\Tax\TaxRateController@postEdit')->before('manage_tax_permission');


        // Help Rates

        Route::get('help-rates', 'App\Modules\Tax\HelpRateController@getIndex')->before('manage_tax_permission');
        Route::get('help-rates/create', 'App\Modules\Tax\HelpRateController@getCreate')->before('manage_tax_permission');
        Route::post('help-rates/create', 'App\Modules\Tax\HelpRateController@postCreate')->before('manage_tax_permission');

        Route::get('help-rates/{help_rate}/delete', 'App\Modules\Tax\HelpRateController@getDelete')->before('manage_tax_permission');
        Route::post('help-rates/{help_rate}/delete', 'App\Modules\Tax\HelpRateController@postDelete')->before('manage_tax_permission');

        Route::get('help-rates/{help_rate}/edit', 'App\Modules\Tax\HelpRateController@getEdit')->before('manage_tax_permission');
        Route::post('help-rates/{help_rate}/edit', 'App\Modules\Tax\HelpRateController@postEdit')->before('manage_tax_permission');


        // Offset Rate

        Route::get('offset-rates', 'App\Modules\Tax\OffsetRateController@getIndex')->before('manage_tax_permission');
        Route::get('offset-rates/create', 'App\Modules\Tax\OffsetRateController@getCreate')->before('manage_tax_permission');
        Route::post('offset-rates/create', 'App\Modules\Tax\OffsetRateController@postCreate')->before('manage_tax_permission');

        Route::get('offset-rates/{offset_rate}/delete', 'App\Modules\Tax\OffsetRateController@getDelete')->before('manage_tax_permission');
        Route::post('offset-rates/{offset_rate}/delete', 'App\Modules\Tax\OffsetRateController@postDelete')->before('manage_tax_permission');

        Route::get('offset-rates/{offset_rate}/edit', 'App\Modules\Tax\OffsetRateController@getEdit')->before('manage_tax_permission');
        Route::post('offset-rates/{offset_rate}/edit', 'App\Modules\Tax\OffsetRateController@postEdit')->before('manage_tax_permission');


        // Offset Rate

        Route::get('cents-per-kilometre', 'App\Modules\Tax\CentsPerKilometreController@getIndex')->before('manage_tax_permission');
        Route::get('cents-per-kilometre/create', 'App\Modules\Tax\CentsPerKilometreController@getCreate')->before('manage_tax_permission');
        Route::post('cents-per-kilometre/create', 'App\Modules\Tax\CentsPerKilometreController@postCreate')->before('manage_tax_permission');

        Route::get('cents-per-kilometre/{cents_per_kilometre}/delete', 'App\Modules\Tax\CentsPerKilometreController@getDelete')->before('manage_tax_permission');
        Route::post('cents-per-kilometre/{cents_per_kilometre}/delete', 'App\Modules\Tax\CentsPerKilometreController@postDelete')->before('manage_tax_permission');

        Route::get('cents-per-kilometre/{cents_per_kilometre}/edit', 'App\Modules\Tax\CentsPerKilometreController@getEdit')->before('manage_tax_permission');
        Route::post('cents-per-kilometre/{cents_per_kilometre}/edit', 'App\Modules\Tax\CentsPerKilometreController@postEdit')->before('manage_tax_permission');

    });

});
