<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
	<body>

		<header class="row">
			@include('includes.header')
		</header>

		<div id="main" class="container">

			@yield('content')

			<footer class="row">
				@include('includes.footer')
			</footer>

		</div>

		{{ HTML::script('js/script.js') }}
		
	</body>
</html>
