<?php namespace Pretty\posts
use Pretty\eventing\EventGenerator;
use Log;

class Post extends \Eloquent {

	use EventGenerator;

	protected $fillable = array(
		'title',
		'content',
		'isVisible'		
	);
	

	public function storePost($title, $isVisible, $content)
	{
		
		$this->title = $title;
		$this->isVisible = $isVisible;
		$this->content = $content;

		$this->save();

		// Fire a PostWasStored event
		$this->raise(new PostWasStored($this));

		return $this;
	}

}