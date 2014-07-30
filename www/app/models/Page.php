<?php

class Page extends \Eloquent {

	public function post()
	{
		return $this->hasOne('Post');
	}

	public function image()
	{
		return $this->hasOne('Image');
	}
}

