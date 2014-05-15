<?php
class LoyaltyPointsSettings extends Eloquent
{
	protected $table = 'loyalty_points_settings';
	protected $primaryKey = 'level_id';
	public $timestamps = false;
}