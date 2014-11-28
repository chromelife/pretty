<?php

use Pretty\commanding\ValidationCommandBus;

use Pretty\pages\PageStorageCommand;
use Pretty\pages\PageUpdateCommand;
use Pretty\pages\PageDeleteCommand;

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
		$query = '
		select * from pages
		inner join images on pages.image_id = images.image_id
		inner join posts on pages.post_id = posts.post_id
		';

		$pages = DB::select( DB::raw( $query ) );


		//  dd($pages);
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
		$pageImages = Image::lists('image_url', 'image_id');
		$pagePosts = Post::lists('post_title', 'post_id');
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
		$input = Input::only('image_id', 'post_id', 'isVisible');

		$command = new PageStorageCommand ( $input );
		$this->commandBus->execute( $command );

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
		$page = $this->page->find( $id );
		$pageImages = Image::lists('image_url', 'image_id');
		$pagePosts = Post::lists('post_title', 'post_id');

		if (is_null( $page ))
		{
			return Redirect::route( 'pages.index' );
		}

		return View::make( 'pages.edit', compact( 'page', 'pageImages', 'pagePosts' ) );
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
		$input = array_except( Input::all(), '_method' );

		$command = new PageUpdateCommand( $id, $input );
		$this->commandBus->execute( $command );

		return Redirect::route( 'pages.show', $id );

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
		$command = new PageDeleteCommand( $id );
		$this->commandBus->execute( $command );

		return Redirect::route( 'pages.index' );

	}

}
