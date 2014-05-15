<?php

class TaxSalary extends Eloquent
{
    protected $table = 'tax_salary';
    protected $primaryKey = 'id';
    public $timestamps = true;


    function deleteData() {
        return $this->delete();
    }
}
