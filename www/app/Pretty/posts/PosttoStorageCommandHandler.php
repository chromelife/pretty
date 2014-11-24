<?php namespace Pretty\posts;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;
// use Log;

class PosttoStorageCommandHandler implements CommandHandler {

	protected $post;
	protected $dispatcher;

	function __construct( Post $post, EventDispatcher $dispatcher)
	{
		$this->post = $post;
		$this->dispatcher = $dispatcher;

	}

	public function handle( $command )
	{
		$post = $this->post->storePost(
				$command->input
		);
		// Dispatch events
		$this->dispatcher->dispatch( $post->releaseEvents() );
	}

}
