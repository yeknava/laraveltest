@extends('layouts.master')

@section('content')
	<h1>Login</h1>
	{{Form::open()}}
	{{Form::token()}}
		{{Form::label('usersname', 'Username')}}
		{{Form::text('username', Input::old('username'))}}<br />
		{{Form::label('password', 'Password')}}
		{{Form::password('password')}}<br />
		{{Form::submit('Login')}}

	{{Form::close()}}
@stop
