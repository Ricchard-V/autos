<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<title>@yield('tittle','C.I.Autos|Sorteo')</title>
</head>
<body>
	<header>
		@yield('header')
	</header>
	<main>
		@yield('main')
	</main>
	<footer>
		@yield('footer')
	</footer>
</body>
</html>