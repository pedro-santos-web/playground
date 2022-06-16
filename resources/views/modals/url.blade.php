<div id="results-url-modal" class="modal-background" tabindex="-1" aria-hidden="true">

	<div class="relative p-4 w-full h-full flex justify-center items-center">
		<!-- Modal content -->
		<div class="relative w-fit bg-primary rounded-lg shadow">

				<button type="button" class="modal-close" data-modal-toggle="results-url-modal" id="close-results-url-modal">
					<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>

				<div class="py-6 px-6 lg:px-8">
					<h3 class="mb-4 text-xl font-medium text-white">
						Results
					</h3>

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
		</div>
	</div>
	
</div>