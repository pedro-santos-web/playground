<div id="add-host-modal" class="modal-background hidden" tabindex="-1" aria-hidden="true">

	<div class="relative p-4 w-full max-w-md h-full md:h-auto">
		<!-- Modal content -->
		<div class="relative bg-primary rounded-lg shadow">

				<button type="button" class="modal-close" data-modal-toggle="add-host-modal" id="close-add-host-modal">
					<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>

				<div class="py-6 px-6 lg:px-8">
					<h3 class="mb-4 text-xl font-medium text-white">
						Add a new host
					</h3>
					<form class="space-y-6" action="{{ route('add_host') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div>
								<label for="name" class="modal-label">
									Name
								</label>
								<input type="text" name="name" id="name" class="modal-input" placeholder="Example" required>
						</div>
						<div>
							<label for="image" class="modal-label">Image</label>
							<input type="file" name="image" class="modal-input" required>
						</div>
						<div>
								<label for="url" class="modal-label">
									URL
								</label>
								<input type="text" name="url" id="url" placeholder="www.example.com" class="modal-input" required>
						</div>
						<button type="submit" class="btn-primary w-full">
							Add
						</button>
					</form>
				</div>
		</div>
	</div>
	
</div> 