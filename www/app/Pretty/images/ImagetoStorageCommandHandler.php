<?php namespace Pretty\images;

use Pretty\Commanding\CommandHandler;
use Pretty\eventing\EventDispatcher;
use Log;

class ImagetoStorageCommandHandler implements CommandHandler {

	protected $image;
	protected $dispatcher;


	function __construct( Image $image, EventDispatcher $dispatcher)
	{
		$this->image = $image;
		$this->dispatcher = $dispatcher;
		
	}

	public function handle( $command )
	{
		$image = $this->image->storeImage(
			$command->title,
			$command->visible,
			$command->image_url
		);

		Log::info("Value of visible in ImagetoStorageCommandHandler [$command->visible]");

		// Dispatch events
		$this->dispatcher->dispatch( $image->releaseEvents() );
		
	}

}
