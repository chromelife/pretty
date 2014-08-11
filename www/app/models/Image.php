<?php

class Image extends \Eloquent {
	protected $fillable = array(
		'image_url',
		'title',
		'isVisible'		
	);
	
	public static $rules = array(
		'image_url' => 'required',
		'title' => 'required',
		'isVisible' => 'required|boolean'
		
	);

	public function page ()
	{
		return $this->belongsTo('Page');
	}
}