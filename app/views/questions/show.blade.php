@extends('layouts.master')

@section('content')
	<h1>{{ucfirst($question->user->username)}} asks:</h1>
	<p>
		{{e($question->question)}}
	</p>
@stop
