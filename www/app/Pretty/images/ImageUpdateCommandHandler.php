<?php namespace Pretty\images;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;
// use Log;

class ImageUpdateCommandHandler implements CommandHandler {

	protected $image;
	protected $dispatcher;

	function __construct( Image $image, EventDispatcher $dispatcher)
	{
		$this->image = $image;
		$this->dispatcher = $dispatcher;
		
	}

	public function handle( $command )
	{
		$image = $this->image->updateImage(
			$command->id,
			$command->title,
			$command->isVisible
						
		);
		
		// Dispatch events
		$this->dispatcher->dispatch( $image->releaseEvents() );
		
	}

}
