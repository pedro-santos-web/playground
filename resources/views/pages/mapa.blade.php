@extends('master')

@section('title') Map @stop

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
@endpush

@section('content')
<div id="map"></div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
crossorigin=""></script>
<script>
	@if(isset($lat) && isset($lon))
	
	var map = L.map('map').setView(["{{$lat}}", "{{$lon}}"], 15);
	
	let marker = new L.Marker(["{{$lat}}", "{{$lon}}"]);
	marker.addTo(map);

	@else
	
	var map = L.map('map').setView([39.415, -8.904], 8);
	
	@endif

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '© OpenStreetMap'
	}).addTo(map);
</script>
@endpush
