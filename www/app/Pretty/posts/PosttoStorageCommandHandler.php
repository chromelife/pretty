<?php namespace Pretty\posts;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;
use Log;

class PosttoStorageCommandHandler implements CommandHandler {

	protected $post;
	protected $dispatcher;


	function __construct( Post $post, EventDispatcher $dispatcher)
	{
		$this->post = $post;
		$this->dispatcher = $post;
		
	}

	public function handle( $command )
	{
		$post = $this->post->storeImage(
			$command->title,
			$command->visible,
			$command->content
		);

		// Log::info("Value of visible in ImagetoStorageCommandHandler [$command->visible]");

		// Dispatch events
		$this->dispatcher->dispatch( $post->releaseEvents() );
		
	}

}
