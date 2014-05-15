<?php

class TaxBankInterest extends Eloquent
{
    protected $table = 'tax_bank_interests';
    protected $primaryKey = 'id';
    public $timestamps = true;


    function deleteData() {
        return $this->delete();
    }
}
