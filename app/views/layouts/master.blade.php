<html>
	<head>
		<title>{{$title}}</title>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		{{HTML::style('css/bootstrap.min.css')}}
		{{HTML::style('css/main.css')}}
		{{HTML::script('/js/application.js')}}
	</head>
	<body>
		<div id="container">
			<div id="header">
				{{HTML::link('/', 'Make it snappy!')}}
				<div id="searchbar">
					{{Form::open(array('action' => 'QuestionsController@postSearch', 'method' => 'POST'))}}
						{{Form::text('keyword', 'Search', array('id'=>'keyword'))}}
						{{Form::submit('Search')}}
					{{Form::close()}}
				</div>
			</div>
			<div id="nav">
				<ul>
					<li class="btn btn-primary">{{HTML::linkRoute('home', 'Home')}}</li>
					@if(!Auth::check())
						<li class="btn btn-primary">{{HTML::linkRoute('register', 'Register')}}</li>
						<li class="btn btn-primary">{{HTML::linkRoute('login', 'Login')}}</li>
					@else
						<li class="btn btn-primary">{{HTML::linkRoute('yourQuestion', 'Your Qs')}}</li>
						<li class="btn btn-primary">{{HTML::linkRoute('logout', 'Logout '.Auth::user()->username)}}</li>
					@endif
				</ul>
			</div>
			<div id="content">
				@if(Session::has('message'))
					<p id="message">
						{{Session::get('message')}}
					</p>
				@endif
				@yield('content')
			</div>
			<div id="footer">
				copyleft {{date('Y')}} :-)
			</div>
		</div>
		{{HTML::script('js/bootstrap.min.js')}}
	</body>
</html>
