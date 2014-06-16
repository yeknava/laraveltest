<?php

class AnswersController extends \BaseController {

	public $restful = true;
	public function __construct() {
		$this->beforeFilter('auth', array('only' => 'postCreate'));
	}
	/**
	 * Display a listing of the resource.
	 * GET /answers
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /answers/create
	 *
	 * @return Response
	 */
	public function postCreate()
	{
		$validation = Answer::validate(Input::all());
		$question_id = Input::get('questionId');
		if($validation->passes()) {
			Answer::create(array(
				'answer'=>Input::get('answer'),
				'user_id'=>Auth::user()->id,
				'question_id'=>$question_id
			));
			return Redirect::route('question', $question_id)->with('message', 'your answer has been posted!');
		} else {
			return Redirect::route('question', $question_id)->withErrors($validation)->withInput();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /answers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /answers/{id}
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
	 * GET /answers/{id}/edit
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
	 * PUT /answers/{id}
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
	 * DELETE /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
