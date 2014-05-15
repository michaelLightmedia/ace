<?php 

class Group extends Eloquent
{

	protected $table = 'groups';
	protected $primaryKey = "id";
	public $timestamps = false;
	
	public function user()
	{
		return $this->hasMany('User');
	}


	/**
     * Get the roles a group has
     */
    public function roles()
    {
        return $this->belongsToMany('Role', 'groups_roles');
    }


    /**
     * Find out if group has a specific role
     *
     * $return boolean
     */
    public function hasRole($check)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'capability'));
    }


	public function lists()
	{
		return Group::all();
	}
}