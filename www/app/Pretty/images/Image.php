<?php namespace Pretty\images;

use Pretty\eventing\EventGenerator;
use Log;

class Image extends \Eloquent {

	use EventGenerator;

	public function storeImage($title, $visible, $image_url)
	{
		// store image details in DB through Eloquent model
		$this->title = $title;
		$this->visible = $visible;
		$this->image_url = $image_url;

		Log::info("Value of visible in Image [$visible][$this->visible], [$this]");

		$this->save();

		// Fire a ImageWasStored event
		$this->raise(new ImageWasStored($this));

		return $this;
	}

}

