@extends('layouts.master')

@section('content')
	<h1>Register</h1>

	@if($errors->has())
		<ul id="FormErrorMessage">
			{{$errors->first('username', '<li>:message</li>')}}
			{{$errors->first('password', '<li>:message</li>')}}
			{{$errors->first('password_confirmation', '<li>:message</li>')}}
		</ul>
	@endif

	{{Form::open()}}
		{{Form::token()}}

		{{Form::label('username','Username')}}
		{{Form::text('username', Input::old('username'))}}<br />

		{{Form::label('password', 'Password')}}
		{{Form::password('password')}}<br />

		{{Form::label('password_confirmation', 'Confirm Password')}}
		{{Form::password('password_confirmation')}}<br />

		{{Form::submit('Register')}}
	{{Form::close()}}
@stop
