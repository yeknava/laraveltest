@extends('layouts.master')

@section('content')
	<h1>{{ucfirst($username)}} Questions</h1>
	@if(!$questions->links())
		<p>
			You have not posted any yet!
		</p>
	@else
		<ul>
			@foreach($questions as $question)
				<li>
					{{Str::limit(e($question->question), 40)}} -
					{{ ($question->solved) ? ("(Solved)") : ("")}}
					{{HTML::linkroute('editQuestion', 'Edit', $question->id)}} -
					{{HTML::linkRoute('question', 'show', $question->id)}}
				</li>
			@endforeach
		</ul>

		{{$questions->links()}}
	@endif
@stop
