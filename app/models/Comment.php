<?php


class Comment extends Eloquent
{

	protected $table = 'posts_comments';
    public $timestamps = false;

    public function ppost()
    {
    	return $this->belongsTo('PPost');
    }

}