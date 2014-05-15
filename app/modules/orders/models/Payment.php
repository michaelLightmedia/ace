<?php

class Payment extends Eloquent
{
	protected $table = 'payments';
	protected $primaryKey = 'txnid';
    public $timestamps = false;


}