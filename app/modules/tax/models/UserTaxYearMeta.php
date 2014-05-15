<?php

class UserTaxYearMeta extends Eloquent {

    protected $table = 'usertaxyearmeta';
    protected $primaryKey = "meta_id";
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('UserTaxMeta');
    }

}