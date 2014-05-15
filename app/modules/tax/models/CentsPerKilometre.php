<?php

class CentsPerKilometre extends Eloquent
{
    protected $table = 'cents_per_kilometre';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Edit Add Delete Query

    function validateData() {
        $input = Input::all();
        $return_url = '/admin/tax-form/settings/cents-per-kilometre/create';

        // Default rules
        $rules = array(
            'engine_capacity' => 'required|max:255',
            'cents_per_kilometre' => 'required|numeric|min:0',
        );

        // If Edit
        if (!empty($this->id) && $this->id > 0) {
            $return_url = "/admin/tax-form/settings/cents-per-kilometre/{$this->id}/edit";
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
        $this->engine_capacity = Input::get('engine_capacity');
        $this->cents_per_kilometre = Input::get('cents_per_kilometre');
        $this->save();
    }

    function deleteData() {
        return $this->delete();
    }


    // Static Query Helper
    public static function getAll() {
        return self::all();
    }

}
