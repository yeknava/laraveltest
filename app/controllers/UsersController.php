<?php

class UsersController extends BaseController {

	protected $layout = 'layouts.master';
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$view = View::make('users.index');
		return $view->with(array('title'=>'Register New User'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function post()
	{
		$validation = Users::validate(Input::all());
		if($validation->passes()) {
			$input = Input::all();
			Users::create(array(
				'username'=>Input::get('username'),
				'password'=>Hash::make(Input::get('password'))
			));
			$user = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);
			Auth::attempt($user);
			return Redirect::to('/')->with('message', 'Thanks For Registering. you are now Logged in');
		} else {
			return Redirect::to('users')->withErrors($validation)->withInput();
		}
	}

	public function login()
	{
		return View::make('users.login')->with('title', 'Make It Snapy - Login');
	}
	public function postLogin()
	{
		$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($user)) {
			return Redirect::to('/')->with('message', 'success login');
		} else {
			return Redirect::to('/users/login')->
				with('message', 'There is something Wrong with your username and/or password')->withInput();
		}
	}

	public function getLogout()
	{
		if(Auth::check()){
			return Auth::logout();
			return Redirect::to('users/login')->with('message', 'You are now logged out');
		} else {
			return Redirect::to('/');
		}
	}
	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
