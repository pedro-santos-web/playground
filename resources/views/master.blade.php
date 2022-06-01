<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title>@yield('title')</title>

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	{{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

	@stack('styles')

</head>
<body>

	@include('partials.header')

	@yield('content')

	@stack('scripts')

</body>
</html>