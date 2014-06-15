@extends('layouts.master')

@section('content')
	<h1>Edit Your Question</h1>

	@if($errors->has())
		<ul id="form-errors">
			{{$errors->first('question', '<li>:message</li>')}}
			{{$errors->first('solved', '<li>:message</li>')}}
		</ul>
	@endif

	{{Form::open(array('action' => 'QuestionsController@putUpdate', 'method' => 'PUT'))}}
		{{Form::label('question', 'Question')}}
		{{Form::text('question', $question->question)}}

		{{Form::label('solved', 'Solved')}}
		@if($question->solved == 0)
			{{Form::checkbox('solved', 1, false)}}
		@elseif($question->solved == 1)
			{{Form::checkbox('solved', 0, true)}}
		@endif
		{{Form::hidden('questionid',$question->id)}}
		{{Form::submit('Update')}}
	{{Form::close()}}
@stop
