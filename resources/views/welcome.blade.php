@extends('master')

@section('title') Home @stop

@section('content')
<div class="relative flex flex-col bg-gray-700 h-screen justify-start items-center p-20">
	<div class="input-container">
		<h1 class="text-3xl font-bold text-white">
			@if(isset($location))
				{{ $location }}
			@endif
			Welcome
		</h1>
	</div>
</div>
@endsection