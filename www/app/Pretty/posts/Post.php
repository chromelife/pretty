<?php namespace Pretty\posts

use Pretty\eventing\EventGenerator;
// use Log;

class Post extends \Eloquent {

	use EventGenerator;

	protected $fillable = [ 'title', 'content', 'isVisible'	];
	
	public static function storePost( $title, $isVisible, $content )
	{
		$post = static::create( compact( 'title', 'isVisible', 'content' ));

		// Fire a PostWasStored event
		$post->raise(new PostWasStored( $this ));

		return $this;
	}

}