<?php

class TaxAddress extends Eloquent{

    protected $table = 'tax_address';
    protected $primaryKey = 'id';
    public $timestamps = true;


    // Validation And save data

    function deleteData() {
        return $this->delete();
    }



    // STATIC HELPERS

    public static function hasFiled($user_tax_year_id) {
        return self::where('user_tax_year_id','=',$user_tax_year_id)
            ->first();
    }


}

