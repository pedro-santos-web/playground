@extends('master')

@section('content')

@if($errors->any())
	<div>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="relative flex flex-col w-screen bg-gray-700 min-h-screen justify-start items-center py-20">
	<div class="input-container">
		<form action="{{ route('create_host') }}" method="post" enctype="multipart/form-data" class="flex flex-col">
			@csrf
			
			<label for="name" class="text-white font-bold text-xl">Name</label>
			<input type="text" name="name" class="input-control mb-5" required>
			
			<label for="image" class="text-white font-bold text-xl">Image</label>
			<input type="file" name="image" class="text-white my-5" required>
			
			<label for="url" class="text-white font-bold text-xl">URL</label>
			<small class="text-white text-md">(www.example.com)</small>
			<input type="text" name="url" class="input-control mb-5" required>

			<button type="submit" class="btn-primary mx-0 my-3">Create</button>
		</form>
	</div>
</div>

@endsection