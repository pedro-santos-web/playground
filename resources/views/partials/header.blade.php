<div class="menu-container">

	<div id="toggle-menu" class="menu-icon group">
		<svg class="group-hover:fill-gray-900" xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
	</div>
	
	<div id="menu" class="w-fit flex-col items-end hidden group">
	
		<a href="{{ route('panel') }}">
			<div class="menu-item">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path></svg>
				<p>Home</p>
			</div>
		</a>
	
		<div id="add_host" class="menu-item">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>
			<p>Add host</p>
		</div>
		
		<div id="check_ip" class="menu-item">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="m12 17 1-2V9.858c1.721-.447 3-2 3-3.858 0-2.206-1.794-4-4-4S8 3.794 8 6c0 1.858 1.279 3.411 3 3.858V15l1 2z"></path><path d="m16.267 10.563-.533 1.928C18.325 13.207 20 14.584 20 16c0 1.892-3.285 4-8 4s-8-2.108-8-4c0-1.416 1.675-2.793 4.267-3.51l-.533-1.928C4.197 11.54 2 13.623 2 16c0 3.364 4.393 6 10 6s10-2.636 10-6c0-2.377-2.197-4.46-5.733-5.437z"></path></svg>
			<p>Check IP</p>
		</div>

		<div id="check_url" class="menu-item">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H4V5h16zM4 19v-8h16.001l.001 8H4z"></path><path d="M14 6h2v2h-2zm3 0h2v2h-2z"></path></svg>
			<p>Check URL</p>
		</div>
	
	</div>

</div>

@push('scripts')

	<script>
		// Toggle menu
		$('#toggle-menu').click(function(){
			setTimeout(function() {
				$('#menu').toggleClass('hidden');
				$('#menu').toggleClass('flex');
			}, 300);
		});

		// Add host
		$("#add_host").click(function(){
			$("#add-host-modal").toggleClass("flex");
			$("#add-host-modal").toggleClass("hidden");
		});
		$("#close-add-host-modal").click(function(){
			$("#add-host-modal").toggleClass("flex");
			$("#add-host-modal").toggleClass("hidden");
		});

		// Check ip
		$("#check_ip").click(function(){
			$("#check-ip-modal").toggleClass("flex");
			$("#check-ip-modal").toggleClass("hidden");
		});
		$("#close-check-ip-modal").click(function(){
			$("#check-ip-modal").toggleClass("flex");
			$("#check-ip-modal").toggleClass("hidden");
		});

		$("#close-results-ip-modal").click(function(){
			$("#results-ip-modal").toggleClass("flex");
			$("#results-ip-modal").toggleClass("hidden");
		});

		// Add host
		$("#check_url").click(function(){
			$("#check-url-modal").toggleClass("flex");
			$("#check-url-modal").toggleClass("hidden");
		});
		$("#close-check-url-modal").click(function(){
			$("#check-url-modal").toggleClass("flex");
			$("#check-url-modal").toggleClass("hidden");
		});

		$("#close-results-url-modal").click(function(){
			$("#results-url-modal").toggleClass("flex");
			$("#results-url-modal").toggleClass("hidden");
		});
	</script>

@endpush