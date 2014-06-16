@extends('layouts.master')

@section('content')
	<h1>Search Results</h1>
	@if($questions->getTotal() < 1)
		<p>
			Nothing Found
		</p>
	@else
		<ul>
			@foreach($questions as $question)
				<li>
					{{HTML::linkRoute('question', $question->question, $question->id)}}
					by {{ucfirst($question->user->username)}}
				</li>
			@endforeach
		</ul>
		{{$questions->links()}}
	@endif
@stop
