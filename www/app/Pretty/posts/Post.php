<?php namespace Pretty\posts;

use Pretty\eventing\EventGenerator;
// use Log;

class Post extends \Eloquent {

	use EventGenerator;

	protected $fillable = [ 'post_title', 'post_content' ];

	public function storePost( $post_title, $post_content ){
		
		$post = new Post;
		$post->post_title = $post_title;
		$post->post_content = $post_content;
		$post->save();

		// Fire a PostWasStored event
		$post->raise( new PostWasStored( $post ));

		return $post;
	}

	public function deletePost(){

		// use Eloquent to remove entry from DB
		$this->delete();

		// Fire a PostWasDeleted event
		$post->raise( new PostWasDeleted( $post ));

		return $this;
	}

	public function updatePost( $id, $input ){

		//Get post from id and update with input
		$post = $this->findOrFail( $id );
		$post->post_title = $input['title'];
		$post->post_content = $input['content'];
		$post->update();

		$post->raise( new PostWasUpdated( $post ));

		return $post;

	}

}
