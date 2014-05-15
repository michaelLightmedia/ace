<?php

class TaxMedicare extends Eloquent{

    protected $table = 'tax_medicare';
    protected $primaryKey = 'id';
    public $timestamps = true;






    // STATIC HELPERS

    public static function hasFiled($user_tax_year_id) {
        return self::where('user_tax_year_id','=',$user_tax_year_id)
            ->first();
    }

    public static function hasCoveredPPHC($user_tax_year_id) {
        $user_tax_year = self::where('user_tax_year_id','=',$user_tax_year_id)->first();

        $tax_phi = TaxPHI::where('user_tax_year_id','=',$user_tax_year_id)->first();

        return $user_tax_year && !$tax_phi && $user_tax_year->has_covered_pphc == 1 && $user_tax_year->levy_surcharge_no_days >= 1;
    }


}

