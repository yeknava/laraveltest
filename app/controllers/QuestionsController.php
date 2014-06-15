<?php

class QuestionsController extends BaseController {


	protected $layout = 'layouts.master';
	public function __construct() {
		$this->beforeFilter('auth', array('only' => 'postAsk', 'Yourquestion', 'getEdit', 'putUpdate'));
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
		return View::make('questions.show')
			->with('title', 'View Questions')
			->with('question', Question::find($id));
	}
	public function getYourquestion() {
		return View::make('questions.yourQuestions')
			->with('title', 'Your Questionss')
			->with('username', Auth::user()->username)
			->with('questions', Question::yourQuestion());
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET /questions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// private function question_belongs_to_user($id) {
	// 	$question = Question::find($id);
	// 	if($question->user_id == Auth::user()->id) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }
	public function getEdit($id = NULL)
	{
		$question = Question::find($id);
		if($question->user_id != Auth::user()->id) {
			return Redirect::to('yoursquestion')->with('message', 'Invalid Question');
		} else {
		return View::make('questions.edit')
			->with('title', 'Edit')
			->with('question', Question::find($id));
		}
	}
	public function putUpdate()
	{
		$id = Input::get('id');
		if($id != Auth::user()->id) {
			return Redirect::to('yoursquestion')->with('message', 'Invalid Question');
		}
		$validation = Question::validate(Input::all());
		if($validation->passes()) {
			$question = Question::find($id);
			$question->question = Input::get('question');
			$question->solved = Input::get('solved');
			$question->save();
			return Redirect::route('question', array('id'=>$id))->with('message', 'Your Question has been updated');
		} else {
			return Redirect::route('editQuestion', array('id'=>$id))->withErrors($validation);
		}
	}


	/**
	 * Update the specified resource in storage.
	 * PUT /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function update($id)
	// {
	// 	//
	// }

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
