@extends('layouts.master')

@section('content')
	<h1>{{ucfirst($question->user->username)}} asks:</h1>
	<p>
		{{e($question->question)}}
	</p>

	<div id="answers">
		<h2>Answers</h2>

		@if(!$question->answer)
			<p>
				no answers yet for this question :(
			</p>
		@else
			<ul>
				@foreach($question->answer as $answer)
					<li>{{ e($answer->answer)}} - by {{ucfirst($answer->user->username)}}</li>
				@endforeach
			</ul>
		@endif
	</div>


	<div id="post-answer">
		<h2>Answer This Question</h2>
		@if(!Auth::check())
			<p>
				You should login first
			</p>
		@else
			@if($errors->has())
			<ul id="form-errors">
				{{$errors->first('answer', '<li>:message</li>')}}
			</ul>
			@endif
			{{Form::open(array('action' => 'AnswersController@postCreate', 'method' => 'POST'))}}
				{{Form::hidden('questionId', $question->id)}}
				{{Form::label('answer', 'Answer')}}
				{{Form::text('answer', Input::old('answer'))}}
				{{Form::submit('Post your answer')}}
			{{Form::close()}}
		@endif
	</div>
@stop
