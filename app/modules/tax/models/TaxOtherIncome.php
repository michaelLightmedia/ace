<?php

class TaxOtherIncome extends Eloquent
{
    protected $table = 'tax_other_income';
    protected $primaryKey = 'id';
    public $timestamps = true;

    function deleteData() {
        return $this->delete();
    }
}
