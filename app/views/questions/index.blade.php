@extends('layouts.master')

@section('content')
	<div id="ask">
		<h1>Ask a Question</h1>

		@if(Auth::check())
			@if($errors->has())
				<p>
					The Following Errors have occurred:
				</p>
				<ul id="form-errors">
					{{$errors->first('question', '<li>:message</li>')}}
				</ul>
			@endif
			{{Form::open()}}
			{{Form::token()}}
				{{Form::label('question', 'Question:')}}
				{{Form::text('question', Input::old('question'))}}
				{{Form::submit('Ask')}}
			{{Form::close()}}
		@else
			<p>
				Please login to ask or answer a questions
			</p>
		@endif
	</div>
	<div id="questions">
		<h2>Unsolved Questions</h2>
		@if(!$questions->links())
			<p>
				there is no question
			</p>
		@else
			<ul>
				@foreach($questions as $question)
					<li>
						{{e(Str::limit($question->question, 35))}} by {{$question->users->first()->username}}
					</li>
				@endforeach
			</ul>
			{{$questions->links()}}
		@endif
	</div>
@stop
