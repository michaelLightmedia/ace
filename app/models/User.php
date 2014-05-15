<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $primaryKey = "id";

    /**
     * Get the groups a user has
     */
    public function group()
    {   

        return $this->belongsTo('Group');
    }

    public function postmeta()
    {
    	return $this->hasMany('PostMeta', 'user_id');
    }

    public function usermeta() {
        return $this->hasMany('UserMeta','user_id');
    }



    


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	

    /**
     * Add group to user
     */
    public function makeGroup($title)
    {
        $assigned_group = array();
 
        $group = array_fetch(Group::all()->toArray(), 'group');
        
        $assigned_group = $this->getIdInArray($group, $title);

 
        $this->group()->attach($assigned_group);
    }

    public static function authorById($author_id)
    {
    	return User::find($author_id);
    }



    // META HELPER

    private function getMetaCachedName($meta_name) {
        return 'meta_key_'.$meta_name.'_'.$this->id;
    }

    public function createMeta($key,$value) {

        // remove cached ' meta_key_(meta_name)_(userid)
        Cache::forget( $this->getMetaCachedName($key) );

        $is_exists = $this->usermeta()->where('meta_key','=',$key)->first();

        if ($is_exists) {
            $meta = $is_exists;
        } else {
            $meta = new UserMeta;
        }

        $meta->user_id  = $this->id;
        $meta->meta_key = $key;
        $meta->meta_value = meta2db_value($value) ;
        $meta->save();

    }

    public function getMeta($key) {
        $meta = $this->usermeta()
            ->where('meta_key','=',$key)
            ->remember( 2000,$this->getMetaCachedName($key) )
            ->first();

        if (!$meta) return false;

        return $meta;
    }

    public function updateMeta($key,$value) {
        $this->createMeta($key,$value);
    }

    public function getMetaValue($key,$default = "") {
        $meta = $this->getMeta($key);

        return $meta ? meta_true_value($meta->meta_value) : $default;
    }
}