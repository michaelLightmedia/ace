<?php


class Role extends Eloquent
{

	protected $table = 'roles';
    public $timestamps = false;
 	
    /**
     * Get groups with a certain role
     */
 	public function groups()
    {
        return $this->belongsToMany('Group', 'groups_roles');
    }

}