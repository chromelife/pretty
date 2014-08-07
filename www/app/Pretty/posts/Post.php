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

	public function updatePost () {

		$this->post->find( $id );
		$post->update($command->input);

	}

}