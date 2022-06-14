@extends('master')

@section('title') Check domain @stop

@section('content')
<div class="relative flex flex-col bg-gray-700 min-h-screen justify-start items-center p-10 lg:p-20">

	@if(session()->has('message'))
	<div class="input-container w-fit">
		<div class="alert alert-success">
			<p class="text-secondary text-2xl font-bold">
				{{ session()->get('message') }}
			</p>
		</div>
	</div>
	@endif

	@if(isset($hosts))
	@foreach($hosts as $host)
		@include('partials.hosts')
	@endforeach
	@endif

	<div class="input-container flex-col lg:flex-row">

		<form action="{{ route('list_host') }}" method="POST">
			@csrf
			<label for="website" class="text-white font-bold text-3xl mb-5">Domain Check</label>
			<br>
			<small class="text-white text-md">(www.example.com)</small>
			<br>
			<input type="text" class="input-control" name="website" required>
			<button type="submit" class="btn-primary">
				Check
			</button>
		</form>

		<form action="{{ route('list_host') }}" method="POST" class="mt-8 lg:mt-0">
			@csrf
			<label for="ip" class="text-white font-bold text-3xl mb-5">IP Check</label>
			<br>
			<small class="text-white text-md">(162.222.222.22)</small>
			<br>
			<input type="text" class="input-control" name="ip" required>
			<button type="submit" class="btn-primary">
				Check
			</button>
		</form>
		
	</div>

	@if(isset($info) && !empty($info))
	<div class="input-container">
		<h2 class="font-bold text-secondary text-3xl mb-5">Results</h2>
		<ul class="lg:columns-4">
			@foreach($info as $i => $t)
			@if(is_array($t))
			<li class="font-bold text-lg text-white">{{ $i }}</li>
			<ul>
				@foreach($t as $r)
				<li class="text-lg text-white">{{ $r }}</li>
				@endforeach
			</ul>
			@else
			<li class="text-lg text-white"><b>{{ $i }}</b> => {{ $t }}</li>
			@endif
			@endforeach
		</ul>
	</div>
	@endif

	@if(isset($response) && !empty($response))
	<div class="input-container">
		<h2 class="font-bold text-secondary text-3xl mb-5">Results</h2>
		<ul class="lg:columns-2">
			@foreach($response as $i => $t)
			<li class="text-lg text-white"><b>{{ $i }}</b> => {{ $t }}</li>
			@endforeach
		</ul>
		@if(isset($loc) && !empty($loc) && isset($ip) && !empty($ip))
		<form action="{{ route('map') }}" method="POST">
			@csrf
			<input type="hidden" name="loc" value="{{ $loc }}" required>
			<input type="hidden" name="ip" value="{{ $ip }}" required>
			<button type="submit" class="btn-primary ml-0 mt-4">
				See on map
			</button>
		</form>
		@endif
	</div>
	@endif

</div>
@endsection