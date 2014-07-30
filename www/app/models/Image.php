<?php

class Image extends \Eloquent {
	protected $fillable = array(
		'visible',
		'title',
		'image_url',
		'uploaded_on'
		);
	
	public static $rules = array(
		// 'date' => 'required',
		// 'title' => 'required',
		'visible' => 'required',
		'image' => 'image'
	);

	// public function Page () {

	// 	return $this->belongsTo('Page');
	// };

}