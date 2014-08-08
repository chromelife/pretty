<?php namespace Pretty\posts;

use Pretty\eventing\EventGenerator;
// use Log;

class Post extends \Eloquent {

	use EventGenerator;

	protected $fillable = [ 'title', 'content', 'isVisible'	];
	
	public static function storePost( $title, $isVisible, $content )
	{
		$post = static::create( compact( 'title', 'isVisible', 'content' ));

		// Fire a PostWasStored event
		$post->raise( new PostWasStored( $post ));

		return $post;
	}

	public function deletePost () {

		// use Eloquent to remove entry from DB 
		$this->delete();

		// Fire a PostWasDeleted event
		$post->raise( new PostWasDeleted( $post ));

		return $this;
	}

	public function updatePost ( $id, $title, $content, $isVisible ) {

		//Get post from id and update with input
		$post = $this->findOrFail( $id );
		$post->title = $title;
		$post->content = $content;
		$post->isVisible = $isVisible;
		$post->update();

		$post->raise( new PostWasUpdated( $post ));

		return $post;

	}

}