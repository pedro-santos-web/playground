<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title>Playground</title>

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	{{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

	@stack('styles')

</head>
<body>

	

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

	
	@if(!isset($hosts))
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

		@for ($i = 0; $i < count($hosts); $i++)
			@include('partials.host')
		@endfor

	@endif

	@include('modals.add')
	{{-- @include('modals.edit') --}}
	@include('modals.delete')

	<script src="/js/jquery-3.6.0.min.js"></script>
	@stack('scripts')
	<script>

		// Add host
		$("#add_host").click(function(){
			$("#add-host-modal").toggleClass("flex");
			$("#add-host-modal").toggleClass("hidden");
		});
		$("#close-add-host-modal").click(function(){
			$("#add-host-modal").toggleClass("flex");
			$("#add-host-modal").toggleClass("hidden");
		});

		// Edit host
		// $("#edit_host").click(function(){
		// 	var host_id = $(this).find(".host").val();
		// 	$("#edit-host-modal").toggleClass("flex");
		// 	$("#edit-host-modal").toggleClass("hidden");
		// });
		// $("#close-edit-host-modal").click(function(){
		// 	$("#edit-host-modal").toggleClass("flex");
		// 	$("#edit-host-modal").toggleClass("hidden");
		// });

		// Delete host
		$("#delete_host").click(function(){
			// var host_id = $(this).find(".host").val();
			$("#delete-host-modal").toggleClass("flex");
			$("#delete-host-modal").toggleClass("hidden");
		});
		$("#close-delete-host-modal").click(function(){
			$("#delete-host-modal").toggleClass("flex");
			$("#delete-host-modal").toggleClass("hidden");
		});

	</script>

</body>
</html>