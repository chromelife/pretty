<?php namespace Pretty\images;

use Pretty\eventing\EventGenerator;
use Log;

class Image extends \Eloquent {

	use EventGenerator;

	protected $fillable = array(
		'image_url',
		'title',
		'visible'		
	);
	

	public function storeImage($title, $visible, $image_url)
	{
		// store image details in DB through Eloquent model
		// $image = Image::create(array('title' => $title, 'visible' => $visible, 'image_url' => $image_url));
		
		$this->title = $title;
		$this->isVisible = $visible;
		$this->image_url = $image_url;

		// Log::info(var_dump($this->all()));

		

		// $this->save();

		// Fire a ImageWasStored event
		$this->raise(new ImageWasStored($this));

		return $this;
	}

}

