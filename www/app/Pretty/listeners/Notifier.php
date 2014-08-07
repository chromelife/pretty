<?php namespace Pretty\listeners;

use Pretty\Eventing\EventListener;
use Pretty\Images\ImageWasStored;
use Pretty\Images\ImageWasUploaded;
use Pretty\Images\ImageWasDeleted;
use Pretty\Posts\PostWasStored;

class Notifier extends EventListener{

	public function whenImageWasStored( ImageWasStored $event )
	{
		$flash_message = ( 'Image was stored in DB:' . $event->image->title );
	}

	public function whenImageWasUploaded( ImageWasUploaded $event )
	{
		$flash_message = ( 'Image uploaded to server:' . $event->image->image_url );
	}

	public function whenPostWasStored( PostWasStored $event )
	{
		$flash_message = ( 'Post was stored in DB:'. $event->post->title);
	}

	public function whenImageWasDeleted( ImageWasDeleted $event )
	{
		$flash_message = ( 'Image deleted from DB and server:'. $event->image->title . '(' . $event->image->image_url . ')' );
	}

	public function whenPostWasDeleted( PostWasDeleted $event )
	{
		$flash_message = ( 'Post deleted from DB:'. $event->post->title );
	}
}