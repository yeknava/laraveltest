<?php

class QuestionsController extends BaseController {


	protected $layout = 'layouts.master';
	public function __construct() {
		$this->beforeFilter('auth', array('only' => 'postAsk'));
	}
	/**
	 * Display a listing of the resource.
	 * GET /questions
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = View::make('questions.index');
		return $view->with('title', 'Make It Snappy - Home')->with('questions', Question::unsolved());
	}
	public function post()
	{
		$validation = Question::validate(Input::all());
		if($validation->passes()) {
			Question::create(array(
				'question'=>Input::get('question'),
				'user_id'=>Auth::user()->id
			));
			return Redirect::to('/')->with('message', 'Your question has been posted');
		} else {
			return Redirect::to('/')->withErrors($validation)->withInput();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /questions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /questions
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /questions/{id}/edit
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
	 * PUT /questions/{id}
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
	 * DELETE /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
