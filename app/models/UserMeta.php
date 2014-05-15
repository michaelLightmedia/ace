<?php
class UserMeta extends Eloquent
{
	protected $table = 'usermeta';
	protected $primaryKey = "meta_id";
	public $timestamps = false;


	public function user()
	{
		return $this->belongsTo('User');
	}


	public static function get( $user_id, $meta_key )
	{

	
		return self::where('user_id' , $user_id)
			->where('meta_key', $meta_key)->pluck('meta_value');
	}
}