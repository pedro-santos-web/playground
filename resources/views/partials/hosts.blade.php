<div class="input-container flex-row columns-2 md:columns-3 xl:columns-6">
	<div class="flex flex-col justify-between items-start px-3">
		@if($host->file_path)
		<img src="{{ asset('storage/logos/'.$host->file_path) }}" alt="{{ $host->name }}" class="mb-2">
		@endif
		@if(isset($host->url))
		<small class="text-white">{{ $host->url }}</small>
		@endif
	</div>
	<div class="px-3 flex flex-col justify-between">
		<h2 class="text-white text-xl">IP</h2>
		@if(isset($host->ip))
		<small class="text-white">{{ $host->ip }}</small>
		@endif
	</div>
	<div class="px-3 flex flex-col justify-between">
		<h2 class="text-white text-xl">Code</h2>
		@if(isset($host->code))
		<small class="text-white">{{ $host->code }}</small>
		@endif
	</div>
	<div class="px-3 flex flex-col justify-between">
		<h2 class="text-white text-xl">Scheme</h2>
		@if(isset($host->scheme))
		<small class="text-white">{{ $host->scheme }}</small>
		@endif
	</div>
	<div class="flex flex-col justify-between px-3">
		<h2 class="text-white text-xl">Status</h2>
		@if($host->code < 300)
		<div class="rounded-full bg-green-500 w-4 h-4"></div>
		@elseif($host->code < 400 && $host->code >= 300)
		<div class="rounded-full bg-orange-500 w-4 h-4"></div>
		@else
		<div class="rounded-full bg-red-500 w-4 h-4"></div>
		@endif
	</div>
	<div class="px-3 flex flex-col justify-between">
		<a href="<?php echo $_SERVER["REQUEST_URI"]; ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #22c55e;"><path d="M10 11H7.101l.001-.009a4.956 4.956 0 0 1 .752-1.787 5.054 5.054 0 0 1 2.2-1.811c.302-.128.617-.226.938-.291a5.078 5.078 0 0 1 2.018 0 4.978 4.978 0 0 1 2.525 1.361l1.416-1.412a7.036 7.036 0 0 0-2.224-1.501 6.921 6.921 0 0 0-1.315-.408 7.079 7.079 0 0 0-2.819 0 6.94 6.94 0 0 0-1.316.409 7.04 7.04 0 0 0-3.08 2.534 6.978 6.978 0 0 0-1.054 2.505c-.028.135-.043.273-.063.41H2l4 4 4-4zm4 2h2.899l-.001.008a4.976 4.976 0 0 1-2.103 3.138 4.943 4.943 0 0 1-1.787.752 5.073 5.073 0 0 1-2.017 0 4.956 4.956 0 0 1-1.787-.752 5.072 5.072 0 0 1-.74-.61L7.05 16.95a7.032 7.032 0 0 0 2.225 1.5c.424.18.867.317 1.315.408a7.07 7.07 0 0 0 2.818 0 7.031 7.031 0 0 0 4.395-2.945 6.974 6.974 0 0 0 1.053-2.503c.027-.135.043-.273.063-.41H22l-4-4-4 4z"></path></svg>
		</a>
		<a href="#">
			<svg xmlns="http://www.w3.org/2000/svg" class="mt-2 mb-3" width="24" height="24" style="fill: #22c55e;"><path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path></svg>
		</a>
		<a href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: #c80018;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
		</a>
	</div>
</div>