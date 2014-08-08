<?php namespace Pretty\posts;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;
// use Log;

class PostDeleteCommandHandler implements CommandHandler {

	protected $post;
	protected $dispatcher;

	function __construct( Post $post, EventDispatcher $dispatcher)
	{
		$this->post = $post;
		$this->dispatcher = $dispatcher;
		
	}

	public function handle( $command )
	{
		$post = $this->post->findOrFail ($command->id);

		$post->deletePost();

		$this->dispatcher->dispatch ( $post->releaseEvents() );
	}

}