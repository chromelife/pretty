<?php

use Pretty\commanding\ValidationCommandBus;
use Pretty\posts\PosttoStorageCommand;
use Pretty\posts\PostDeleteCommand;
use Pretty\posts\PostUpdateCommand;

class PostsController extends \BaseController {

	protected $post;
	protected $commandBus;

	function __construct(ValidationCommandBus $commandBus, Post $post )
	{
		$this->commandBus = $commandBus;
		$this->post = $post;
	}

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function index(){

		$posts = Post::all();

		return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create(){

		return View::make('posts.create');
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store(){

		// Get input
		$input = Input::all();
		dd($input);
		// Take inputs, validate, and add new post to db if they pass
		$command = new PosttoStorageCommand ($input);
		$this->commandBus->execute($command);
		return Redirect::route('posts.index');
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){

		$post = Post::findOrFail($id);

		return View::make('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){

		$post = Post::find($id);

		return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified post in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){

		$input = Input::all();

		$command = new PostUpdateCommand( $id, $input );
		$this->commandBus->execute( $command );

		return Redirect::route('posts.index');
	}

	/**
	 * Remove the specified post from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){

		$command = new PostDeleteCommand( $id );
		$this->commandBus->execute( $command );

		return Redirect::route('posts.index');
	}

}
