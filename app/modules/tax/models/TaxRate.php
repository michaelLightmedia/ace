<?php

class TaxRate extends Eloquent
{
    protected $table = 'tax_rates';
    protected $primaryKey = 'id';
    public $timestamps = true;

    function validateData() {
        $input = Input::all();
        $return_url = '/admin/tax-form/settings/tax-rates/create';


        // Default rules



        // Default rules

        list($from_rules,$to_rules) = from_and_to_input('taxable_income_from','taxable_income_to');



        $rules = array(
            'taxable_income_from' => $from_rules,
            'taxable_income_to' =>$to_rules,
            'has_tax' => 'required|in:1,0',
        );

        // If has tax
        if (Input::has('has_tax') && Input::get('has_tax') == 1) {
            $rules['start_at'] = 'required|numeric';
            $rules['cents_per_dollar'] = 'required|numeric';
        }

        // If Edit

        if (!empty($this->id) && $this->id > 0) {
            $return_url = "/admin/tax-form/settings/tax-rates/{$this->id}/edit";
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
        $this->has_tax = Input::get('has_tax');
        $this->start_at = Input::get('start_at');
        $this->cents_per_dollar = Input::get('cents_per_dollar');
        $this->save();
    }

    function deleteData() {
        return $this->delete();
    }


    // Static Helper
    public static function getByTaxableIncome($taxable_income) {

        return DB::selectOne('SELECT
              *
            FROM '.DB::getTablePrefix().'tax_rates
            WHERE
              (? BETWEEN taxable_income_from AND taxable_income_to
                OR ? >= taxable_income_from && taxable_income_to = 0
                OR ? <= taxable_income_to && taxable_income_from = 0)
            ORDER BY taxable_income_from asc',array(
            $taxable_income,
            $taxable_income,
            $taxable_income,
        ));
    }
}


