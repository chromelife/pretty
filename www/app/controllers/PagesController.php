<?php

use Pretty\commanding\ValidationCommandBus;

use Pretty\pages\PageStorageCommand;

class PagesController extends \BaseController {

	protected $page;
	protected $commandBus;

	function __construct( ValidationCommandBus $commandBus, Page $page )
	{
		$this->page = $page;
		$this->commandBus = $commandBus;
	}


	/**
	 * Display a listing of the resource.
	 * GET /pages
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = $this->page->all();

		// dd($pages);
		return View::make( 'pages.index', compact( 'pages' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pages/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pageImages = Image::lists('image_url', 'id');
		$pagePosts = Post::lists('title', 'id');
		return View::make('pages.create', compact( 'pageImages', 'pagePosts'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pages
	 *
	 * @return Response
	 */
	public function store()
	{
		// dd(Input::all());
		$input = Input::only('image_id', 'post_id');
		$image_id = $input['image_id'];
		$post_id = $input['post_id'];

		$command = new PageStorageCommand ($image_id, $post_id);
		$this->commandBus->execute($command);
		
		return Redirect::route( 'pages.index' );
	}

	/**
	 * Display the specified resource.
	 * GET /pages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$page = $this->page->findOrFail( $id );
		return View::make( 'pages.show' , compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pages/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pages/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}