<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
   public function map()
	{

		if(\Request::isMethod('post')){

			if(\Request::has('loc') && \Request::has('ip')){

				$loc = \Request::get('loc');
				$loc = explode(',', $loc);
				$lat = $loc[0];
				$lon = $loc[1];
				$ip = \Request::get('ip');

			}

			$data = array(
				'lat' => $lat,
				'lon' => $lon,
				'ip' => $ip,
			);

			return view('partials.map', $data);

		} else {

			return view('host.list');

		}

	}
}
