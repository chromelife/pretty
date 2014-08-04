<?php namespace Pretty\posts
use Pretty\eventing\EventGenerator;
use Log;

class Post extends \Eloquent {

	use EventGenerator;

	protected $fillable = array(
		'title',
		'content',
		'visible'		
	);
	

	public function storePost($title, $visible, $content)
	{
		// store image details in DB through Eloquent model
		// $post = Post::create(array('title' => $title, 'visible' => $visible, 'content' => $content));
		
		$this->title = $title;
		$this->isVisible = $visible;
		$this->content = $content;

		// Log::info(var_dump($this->all()));

		

		$this->save();

		// Fire a ImageWasStored event
		$this->raise(new PostWasStored($this));

		return $this;
	}

}