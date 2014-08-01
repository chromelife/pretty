<?php

class Image extends \Eloquent {
	protected $fillable = array(
		'image_url',
		'title',
		'visible'		
	);
	
	public static $rules = array(
		'image' => 'image',
		'title' => 'required'
		// 'visible' => 'required'
		
	);


}