<?php

class HelpRate extends Eloquent
{
    protected $table = 'help_rates';
    protected $primaryKey = 'id';
    public $timestamps = true;

    function validateData() {
        $input = Input::all();
        $return_url = '/admin/tax-form/settings/help-rates/create';


        // Default rules

        list($from_rules,$to_rules) = from_and_to_input('taxable_income_from','taxable_income_to');


        $rules = array(
            'taxable_income_from' => $from_rules,
            'taxable_income_to' => $to_rules,
            'repayment_rate' => 'required|min:0|max:100',
        );

        // If Edit

        if (!empty($this->id) && $this->id > 0) {
            $return_url = "/admin/tax-form/settings/help-rates/{$this->id}/edit";
        }

        $validator = Validator::make($input,$rules);

        if($validator->fails()){

            return Redirect::to($return_url)
                ->withErrors($validator)
                ->withInput()
                ->with('error_msg',"Please correct the error below.");

        } else {
            return false;
        }
    }

    function saveData() {

        $this->taxable_income_from = Input::get('taxable_income_from');
        $this->taxable_income_to = Input::get('taxable_income_to');
        $this->repayment_rate = Input::get('repayment_rate');
        $this->save();
    }

    function deleteData() {
        return $this->delete();
    }




    // Get Repayment rate
    public static function getByTaxableIncome($taxable_income) {
        return DB::selectOne('SELECT
                  *
                FROM '.DB::getTablePrefix().'help_rates
                WHERE
                  (? BETWEEN taxable_income_from AND taxable_income_to
                    OR ? >= taxable_income_from && taxable_income_to = 0
                    OR ? <= taxable_income_to && taxable_income_from = 0)
                ORDER BY taxable_income_from asc',array(
                $taxable_income,
                $taxable_income,
                $taxable_income
            ));
    }
}
