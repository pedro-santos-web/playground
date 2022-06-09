@extends('master')

@section('title') Update host @stop

@section('content')
<div class="relative flex flex-col w-screen bg-gray-700 min-h-screen justify-start items-center py-20">

	<div class="input-container flex-row w-fit">

		<form action="{{ route('update_host', $host) }}" method="POST">
			@csrf

			<label for="name" class="text-white font-bold text-xl">Name</label>
			<br>
			<input type="text" class="input-control mb-5" name="name" value="{{ $host->name }}" required>
			<br>
			<label for="url" class="text-white font-bold text-xl">URL</label>
			<br>
			<input type="text" class="input-control mb-5" name="url" value="{{ $host->url }}" required>
			<br>
			<label for="ip" class="text-white font-bold text-xl">IP</label>
			<br>
			<input type="text" class="input-control mb-5" name="ip" value="{{ $host->ip }}" required>
			<br>
			<button type="submit" class="btn-primary w-full ml-0 mt-4">
				Update
			</button>
		</form>

	</div>

</div>
@endsection