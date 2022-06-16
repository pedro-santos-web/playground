@extends('main')

@section('title') Editing - {{ $host->name }} @stop

@section('content')

<div class="relative p-4 w-full max-w-md h-full md:h-auto">

	<div class="relative bg-primary rounded-lg shadow">

		<a href="{{ route('panel') }}">
			<button type="button" class="modal-close">
				<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
		</a>

		<div class="py-6 px-6 lg:px-8">
			<h3 class="mb-4 text-xl font-medium text-white">
				Edit host
			</h3>
			<form class="space-y-6" action="{{ route('edit_host', $host->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div>
					<label for="name" class="modal-label">
						Name
					</label>
					<input type="text" name="name" id="name" class="modal-input" placeholder="{{ $host->name }}" value="{{ $host->name }}" required>
				</div>
				<div>
					<label for="image" class="modal-label">Image</label>
					<input type="file" name="image" class="modal-input">
				</div>
				<div>
					<label for="url" class="modal-label">
						URL
					</label>
					<input type="text" name="url" id="url" placeholder="{{ $host->url }}" value="{{ $host->url }}" class="modal-input" required>
				</div>
				<div>
					<label for="ip" class="modal-label">
						IP
					</label>
					<input type="text" name="ip" id="ip" placeholder="{{ $host->ip }}" value="{{ $host->ip }}" class="modal-input" required>
				</div>
				<button onclick="return confirm('Are you sure?');" type="submit" class="btn-primary w-full">
					Save changes
				</button>
			</form>
		</div>

	</div>


</div>

@endsection