<?php

class Post extends \Eloquent {

	// Add your validation rules here
	public static $rules = array(
		'title' 	=> 'required',
		'content' 	=> 'required',
		'visible' 	=> 'required'
	);

	// Don't forget to fill this array
	protected $fillable = array(
		'title',
		'content',
		'visible'
	);

	// public function Page() {

	// 	return $this->belongsTo('Page');
	// }

}