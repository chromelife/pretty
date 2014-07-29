<?php

class ImagesController extends BaseController {

	/**
	 * Image Repository
	 *
	 * @var Image
	 */
	protected $image;

	public function __construct(Image $image)
	{
		$this->image = $image;
	}

	/**
	 * Display a listing of the images.
	 *
	 * @return Response
	 */
	public function index()
	{
		$images = $this->image->all();
		return View::make('images.index', compact('images'));
	}

	/**
	 * Show the form for uploading a new image
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('images.create');
	}

	/**
	 * Store a new image in storage through an upload
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Image::$rules);
		$destinationPath = '';
		$filename = '';

		if ($validation->passes())
			{
			
			// image selected with picker
			$file = Input::file('image'); 
			// generate destination path for image
			$destinationPath = public_path().'/Photos/';
			// ensure image has recognisable filename
			$filename = $file->getClientOriginalName();
			//write image to filesystem 
			$file->move($destinationPath, $filename); 
			
			//write form input to db
			Image::create 	([	'image_url' => '/Photos/'.$filename,
								'uploaded_on' => Input::get('uploaded_on'),
								'title' => Input::get('title'),
								'visible' => Input::get('visible')
							]);
		

			return Redirect::route('images.index');
		}
		// Show a message if upload does not validate against rules
		return Redirect::route('images.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified image
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$image = $this->image->findOrFail($id);
		return View::make('images.show', compact('image'));
	}

	/**
	 * Show the form for editing the specified image properties.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$image = $this->image->find($id);

		if (is_null($image))
		{
			return Redirect::route('images.index');
		}

		return View::make('images.edit', compact('image'));
	}

	/**
	 * Update the specified image in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Image::$rules);

		if ($validation->passes())
		{
			$image = $this->image->find($id);
			$image->update($input);

			return Redirect::route('images.show', $id);
		}

		return Redirect::route('images.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified image from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->image->find($id)->delete();

		return Redirect::route('images.index');
	}

}
