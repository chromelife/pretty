<?php

class Post extends \Eloquent {

	// Add your validation rules here
	public static $rules = array(
		'title' 	=> 'required',
		'content' 	=> 'required',
		'isVisible' => 'required|boolean'
	);

	// Don't forget to fill this array
	protected $fillable = array(
		'title',
		'content',
		'isVisible'
	);

	public function page ()
	{
		return $this->belongsTo('Page', 'page_id');
	}
}