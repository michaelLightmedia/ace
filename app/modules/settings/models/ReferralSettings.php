<?php
class ReferralSettings extends Eloquent
{
	protected $table = 'referral_settings';
	protected $primaryKey = 'level_id';
	public $timestamps = false;
}