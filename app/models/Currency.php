<?php 

class Currency extends Eloquent
{

	protected $table = 'currencies';
	protected $primaryKey = "code";
	public $timestamps = false;

}