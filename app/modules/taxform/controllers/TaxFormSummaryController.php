<?php
namespace App\Modules\TaxForm;

class TaxFormSummaryController extends \BaseController
{

    // Get Data

    function getIndex(\UserTaxYear $user_tax_year) {

        $income_summary = new \TaxSummary($user_tax_year);
        $render = array(
            'user_tax_year' => $user_tax_year,
            'income_summary'   => $income_summary,
            'which_process' => 'payment'
        );

        return \View::make('taxform::tax_form.summary.index')->with($render);
    }

}