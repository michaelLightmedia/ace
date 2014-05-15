<?php

class TaxYear extends Eloquent
{
    protected $table = 'tax_years';
    protected $primaryKey = 'year';
    public $timestamps = true;

    public static function getAllActive() {
        return self::where('is_active','=',1)->get();
    }

    function validateData() {
        $input = Input::all();
        $return_url = '/admin/tax-form/settings/tax-years/create';

        // Default rules
        $rules = array(
            'year' => 'required|unique:tax_years,year',
            'is_active' => 'required|in:1,0',
        );

        // If Edit
        if (!empty($this->year) && $this->year > 0) {
            $rules['year'] = 'required|exists:tax_years,year';
            $return_url = "/admin/tax-form/settings/tax-years/{$this->year}/edit";
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
        $this->year = Input::get('year');
        $this->year_from = d2db(Input::get('year_from'));
        $this->year_to = d2db(Input::get('year_to'));
        $this->is_active = Input::get('is_active');
        $this->save();
    }

    function deleteData() {
        return $this->delete();
    }
}
