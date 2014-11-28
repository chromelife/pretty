<?php namespace Pretty\images;

use Pretty\eventing\EventGenerator;
use File;

class Image extends \Eloquent {

	use EventGenerator;

	protected $fillable = [ 'image_url', 'image_name' ];


	public static function storeImage( $input, $file )
	{
		// Save image to server filesystem
		$filename = $file->getClientOriginalName();
		$destinationPath = public_path() . '/Photos/';
		$image_url = '/Photos/'.$filename;
		$file = $file->move ( $destinationPath , $filename );

		$image->image_name = $input['title'];

		// store image details in DB through Eloquent model
		$image = static::create( compact( 'image_url', 'image_name' ));

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

	public function updateImage( $image_id, $input )
	{
		$image = $this->findOrFail( $image_id );
		$image->image_name = $input['title'];
		$image->update();

		$image->raise( new ImageWasUpdated( $image ) );

		return $image;
	}

}
