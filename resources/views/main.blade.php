<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	
	<title>@yield('title') | {{ env('APP_NAME') }}</title>

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	@stack('styles')

</head>
<body>

	@include('partials.header')
	
	@yield('content')
	
	{{-- ! Criar footer com créditos --}}
	{{-- @include('partials.footer') --}}

	{{-- ! Fazer modal para os erros --}}
	@if($errors->any())
		<div>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if(isset($response) && !empty($response))
		@include('modals.ip')
	@endif

	@if(isset($info) && !empty($info))
		@include('modals.url')
	@endif

	@include('host.add')
	@include('check.ip')
	@include('check.url')

	<script src="/js/jquery-3.6.0.min.js"></script>

	@stack('scripts')

</body>
</html>