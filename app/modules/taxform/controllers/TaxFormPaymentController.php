<?php
namespace App\Modules\TaxForm;

class TaxFormPaymentController extends \BaseController
{

    // Get Data

    function getIndex(\UserTaxYear $user_tax_year) {

        $render = array(
            'user_tax_year' => $user_tax_year,
            'income_summary'   => new \TaxSummary($user_tax_year),
            'user_tax_detail' => \UserTaxDetail::getByTaxYearId($user_tax_year->id),
            'which_process' => 'summary'
        );

        return \View::make('taxform::tax_form.payment.index')->with($render);
    }

}