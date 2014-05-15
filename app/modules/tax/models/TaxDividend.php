<?php

class TaxDividend extends Eloquent
{
    protected $table = 'tax_dividends';
    protected $primaryKey = 'id';
    public $timestamps = true;

    function deleteData() {
        return $this->delete();
    }
}
