<?php

class OffsetRate extends Eloquent
{
    protected $table = 'offset_rates';
    protected $primaryKey = 'id';
    public $timestamps = true;

    function offsetRateBaseLevels() {
        return $this->hasMany('OffsetRateBaseLevel','offset_rate_id','id');
    }

    function validateData() {
        $input = Input::all();
        $return_url = '/admin/tax-form/settings/offset-rates/create';


        // Default rules

        // Default rules
        list($from_rules,$to_rules) = from_and_to_input('taxable_income_from','taxable_income_to');

        $rules = array(
            'taxable_income_from' => $from_rules,
            'taxable_income_to' => $to_rules,
            'status' => 'required|in:single,family'
        );

        if (Input::has('offset_rate_base_levels') && is_array(Input::get('offset_rate_base_levels'))) {

            // The Input
            foreach(Input::get('offset_rate_base_levels') as $key=>$value) {


                list($from_rules,$to_rules) = from_and_to_input("offset_rate_base_levels.{$key}.level_from","offset_rate_base_levels.{$key}.level_to");


                // Rules
                $rules["offset_rate_base_levels.{$key}.level_from"]          =  $from_rules;
                $rules["offset_rate_base_levels.{$key}.level_to"] = $to_rules ;
                $rules["offset_rate_base_levels.{$key}.offset_rate"]    = 'required|numeric|max:999';
            }

        }

        // If Edit
        if (!empty($this->id) && $this->id > 0) {
            $return_url = "/admin/tax-form/settings/offset-rates/{$this->id}/edit";
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
        $this->status = Input::get('status');
        $this->save();

        // Remove Existing data from rate base levels
        $delete = OffsetRateBaseLevel::where('offset_rate_id','=',$this->id)->delete();

        foreach (Input::get('offset_rate_base_levels') as $value) {
            $base_level = new OffsetRateBaseLevel;
            $base_level->offset_rate_id = $this->id;
            $base_level->level_from = isset($value['level_from']) ? $value['level_from'] : null;
            $base_level->level_to = isset($value['level_to']) ? $value['level_to'] : null;
            $base_level->offset_rate = isset($value['offset_rate']) ? $value['offset_rate'] : null;
            $base_level->save();
        }
    }

    function deleteData() {
        return $this->delete();
    }





    // Static Query Helpers
    /**
     *
     *
     * @param $taxable_income
     * @param $status
     * @param $age
     * @return int - Offset Rate
     */
    public static function getOffsetRate($taxable_income,$status,$age) {
        $tax_offset = DB::selectOne('SELECT * FROM gy_offset_rates GOR
            WHERE (? BETWEEN GOR.taxable_income_from AND GOR.taxable_income_to
                    OR ? >= GOR.taxable_income_from && GOR.taxable_income_to = 0
                    OR ? <= GOR.taxable_income_to && GOR.taxable_income_from = 0)
                  AND GOR.status = ?
            ORDER BY GOR.taxable_income_from ASC',array(
            $taxable_income,
            $taxable_income,
            $taxable_income,
            $status
        ));

        if ($tax_offset) {
            $base_level = DB::selectOne('SELECT * FROM gy_offset_rate_base_levels ORBL
                WHERE (? BETWEEN ORBL.level_from AND ORBL.level_to
                            OR ? >= ORBL.level_from && ORBL.level_to = 0
                            OR ? <= ORBL.level_to && ORBL.level_from = 0)
                      AND ORBL.offset_rate_id = 8
                ORDER BY ORBL.level_from ASC',array(
                $age,
                $age,
                $age,
                $tax_offset->id
            ));

            if ($base_level) {
                if (is_numeric($base_level->offset_rate)) {
                    return (int) $base_level->offset_rate;
                }
            }
        }

        return 0;

    }
}
