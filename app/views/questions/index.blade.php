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
						{{HTML::linkRoute('question',Str::limit($question->question, 35), $question->id)}}
						by {{ucfirst($question->user->username)}}
						- ({{count($question->answer)}} Answers)
						<!-- - ({{str_plural(count($question->answer))}} Answers) -->
					</li>
				@endforeach
			</ul>
			{{$questions->links()}}
		@endif
	</div>
@stop
