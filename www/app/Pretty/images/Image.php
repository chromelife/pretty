<?php namespace Pretty\images;

use Pretty\eventing\EventGenerator;
use File;

class Image extends \Eloquent {

	use EventGenerator;

	protected $fillable = [ 'image_url', 'title', 'isVisible' ];
	
	public static function storeImage( $title, $isVisible, $file )
	{
		// Save image to server filesystem
		$filename = $file->getClientOriginalName();
		$destinationPath = public_path() . '/Photos/';
		$image_url = $destinationPath . $filename;
		$file->move ( $image_url);

		// store image details in DB through Eloquent model
		$image = static::create( compact( 'title', 'image_url', 'isVisible' ));
				
		// Fire a event
		$image->raise( new ImageWasStored( $image ));

		return $image;
	}

	public function deleteImage()
	{
		$file = public_path() . $this->image_url;
		// Using File facade to delete file from filesystem (I got a bit confused here)
		File::delete($file);
		// removing image record from table
		$this->delete();

		//Fire a event
		$this->raise ( new ImageWasDeleted( $this ) );

		return $this;
	}

	public function updateImage()
	{
		$this->image->findOrFail();
		$image->update($input);

		$this->raise ( new ImageWasUpdated( $this ) );
	}

}

