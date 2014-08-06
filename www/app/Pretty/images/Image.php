<?php namespace Pretty\images;

use Pretty\eventing\EventGenerator;
// use Log;
use File;

class Image extends \Eloquent {

	use EventGenerator;

	protected $fillable = ['image_url', 'title', 'isVisible'];
	
	public function uploadImage($file, $destinationPath, $filename)
	{
		$this->file = $file;
		$this->destinationPath = $destinationPath;
		$this->filename = $filename;
		$file->move( $destinationPath, $filename );

		// Fire a event
		$this->raise(new ImageWasUploaded( $this ));

		return $this;
	}


	public static function storeImage($title, $isVisible, $image_url)
	{
		// store image details in DB through Eloquent model
		$image = static::create( compact( 'title', 'image_url', 'isVisible' ));
				
		// Fire a event
		$image->raise( new ImageWasStored( $image ));

		return $image;
	}

	public function deleteImage()
	{
		// $this->files->delete(public_path() . $image->image_url);
		$file = public_path() . $this->image_url;
		File::delete($file);
		$this->delete();

		//Fire a event
		$this->raise ( new ImageWasDeleted($this) );

		return $this;
	}

}

