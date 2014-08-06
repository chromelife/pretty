<?php

class Image extends \Eloquent {
	protected $fillable = array(
		'image_url',
		'title',
		'isVisible'		
	);
	
	public static $rules = array(
		'image' => 'image',
		'title' => 'required',
		'isVisible' => 'required'
		
	);


}