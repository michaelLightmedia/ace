<?php

class TaxMLS extends Eloquent
{
    protected $table = 'tax_mls';
    protected $primaryKey = 'id';
    public $timestamps = true;

    function validateData() {
        $input = Input::all();
        $return_url = '/admin/tax-form/settings/tax-mls/create';


        // Default rules

        // Default rules

        list($from_rules,$to_rules) = from_and_to_input('taxable_income_from','taxable_income_to');

        $rules = array(
            'status' => 'required|in:single,family',
            'taxable_income_from' =>  $from_rules,
            'taxable_income_to' =>  $to_rules,
            'mls_rate' => 'required|numeric|min:0|max:1000'
        );

        // If Edit
        if (!empty($this->id) && $this->id > 0) {
            $return_url = "/admin/tax-form/settings/tax-mls/{$this->id}/edit";
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
        $this->status = Input::get('status');
        $this->taxable_income_from = Input::get('taxable_income_from');
        $this->taxable_income_to = Input::get('taxable_income_to');
        $this->mls_rate = Input::get('mls_rate');
        $this->save();
    }

    function deleteData() {
        return $this->delete();
    }


    // Static Helpers AND query
    static function getByTaxableIncome($family_status,$taxable_income) {
        return DB::selectOne('SELECT
                  *
                FROM '.DB::getTablePrefix().'tax_mls
                WHERE
                  (? BETWEEN taxable_income_from AND taxable_income_to
                    OR ? >= taxable_income_from && taxable_income_to = 0
                    OR ? <= taxable_income_to && taxable_income_from = 0)
                  AND status = ?
                ORDER BY taxable_income_from asc',array(
            $taxable_income,
            $taxable_income,
            $taxable_income,
            $family_status
        ));
    }
}
