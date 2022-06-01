@extends('master')

@section('title') Check domain @stop

@section('content')
<div class="relative flex flex-col w-screen bg-gray-700 min-h-screen justify-start items-center py-20">

	@foreach($hosts as $host)
		@include('partials.hosts')
	@endforeach

	<div class="input-container">
		<form action="{{ route('list_host') }}" method="POST">
			@csrf
			<label for="website" class="text-white font-bold text-3xl mb-5">Custom check</label>
			<br>
			<small class="text-white text-lg">www.example.com</small>
			<br>
			<input type="text" class="input-control" name="website" required>
			<button type="submit" class="btn-primary">
				Verify
			</button>
		</form>
	</div>

	@if(isset($info))
	<div class="input-container">
		<h2 class="font-bold text-green-500 text-3xl mb-5">Results</h2>
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

</div>
@endsection