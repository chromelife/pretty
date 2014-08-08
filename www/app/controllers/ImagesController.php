<?php

use Pretty\commanding\ValidationCommandBus;
use Pretty\images\ImagetoStorageCommand;
use Pretty\images\ImageUpdateCommand;
use Pretty\images\ImageDeleteCommand;

class ImagesController extends BaseController {

	protected $image;
	protected $commandBus;

	function __construct( ValidationCommandBus $commandBus, Image $image )
	{
		$this->image = $image;
		$this->commandBus = $commandBus;
	}

	/**
	 * Display a listing of the images.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$images = $this->image->all();
		return View::make( 'images.index', compact( 'images' ) );
	}

	/**
	 * Show the form for uploading a new image
	 *
	 * @return View
	 */
	
	public function create()
	{
		return View::make( 'images.create' );
	}

	/**
	 * Store a new image in storage through an upload
	 *
	 * @return Response
	 */
	
	public function store()
	{
		// Grab form inputs
		$input = Input::only( 'title', 'isVisible' );
		$file = Input::file( 'image' );
		$title = $input[ 'title' ];
		$isVisible = $input[ 'isVisible' ];
				
		// Store image in DB and filesystem
		$command = new ImageToStorageCommand ( $title, $isVisible, $file );
		$this->commandBus->execute( $command );

		return Redirect::route( 'images.index' );
	}

	/**
	 * Display the specified image
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function show( $id )
	{
		$image = $this->image->findOrFail( $id );
		return View::make( 'images.show', compact( 'image' ) );
	}

	/**
	 * Show the form for editing the specified image properties.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function edit( $id )
	{
		$image = $this->image->find( $id );

		if (is_null( $image ))
		{
			return Redirect::route( 'images.index' );
		}

		return View::make( 'images.edit', compact( 'image' ) );
	}

	/**
	 * Update the specified image in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function update( $id )
	{
		// Grab inputs from edit form
		$input = array_except( Input::all(), '_method' );
		$title = $input['title'];
		$isVisible = $input['isVisible'];
		
		// perform update on Images table
		$command = new ImageUpdateCommand($id, $title, $isVisible);
		$this->commandBus->execute($command);
		
		return Redirect::route( 'images.show', $id );
	}

	/**
	 * Remove the specified image from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function destroy( $id )
	{
		$command = new ImageDeleteCommand( $id );
		$this->commandBus->execute( $command );
	
		return Redirect::route( 'images.index' );
	}

}
