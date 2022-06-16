@extends('main')

@section('title') Hosts @stop

@section('content')

	@if(!isset($hosts) || empty($hosts) || $hosts->isEmpty())
	<style>
		html {height: 100%;}
	</style>
	<div class="main w-fit">

		<div class="flex flex-col justify-center w-full items-center">
			<h1 class="text-white font-bold text-center text-3xl mb-5">
				No hosts found!
			</h1>
			<button id="add_host" class="btn-primary" type="button" data-modal-toggle="add-host-modal">
				Add host
			</button>
		</div>

	</div>
	@else

	<div class="h-full w-full">
		@for ($i = 0; $i < count($hosts); $i++)
			@include('host.host')
		@endfor
	</div>

	@endif

@endsection