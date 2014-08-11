<?php namespace Pretty\pages;

use Pretty\eventing\EventGenerator;

class Page extends \Eloquent {
	
	use EventGenerator;

	protected $fillable = [ 'image_id', 'post_id' ];

	public static function storePage( $image_id, $post_id )
	{
	
		$page = static::create ( compact ( 'image_id', 'post_id' ) );

		$page->raise( new PageWasStored( $page ));

		return $page;
	}

}