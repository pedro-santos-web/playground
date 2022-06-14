@php
	$icons = array(
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path></svg>',
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path></svg>',
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M20 3H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM4 9V5h16v4zm16 4H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2zM4 19v-4h16v4z"></path><path d="M17 6h2v2h-2zm-3 0h2v2h-2zm3 10h2v2h-2zm-3 0h2v2h-2z"></path></svg>',
		'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="m12 17 1-2V9.858c1.721-.447 3-2 3-3.858 0-2.206-1.794-4-4-4S8 3.794 8 6c0 1.858 1.279 3.411 3 3.858V15l1 2z"></path><path d="m16.267 10.563-.533 1.928C18.325 13.207 20 14.584 20 16c0 1.892-3.285 4-8 4s-8-2.108-8-4c0-1.416 1.675-2.793 4.267-3.51l-.533-1.928C4.197 11.54 2 13.623 2 16c0 3.364 4.393 6 10 6s10-2.636 10-6c0-2.377-2.197-4.46-5.733-5.437z"></path></svg>',
	);
	$routes = array(
		'home',
		'create_host',
		'list_host',
		'map',
	);
@endphp

<div class="float-left top-0 left-0 h-full w-16 m-0 flex flex-col bg-primary text-secondary" style="z-index: 10000;">

	@for ($i = 0; $i < count($routes); $i++)
		<a href="{{ route($routes[$i]) }}">
			<div class="sidebar-icon group">
				{!! $icons[$i] !!}
				<span class="sidebar-tooltip group-hover:scale-100">
					{{ strtoupper($routes[$i]) }}
				</span>
			</div>
		</a>
	@endfor

</div>