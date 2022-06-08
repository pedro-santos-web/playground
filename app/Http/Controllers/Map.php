<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Map extends Controller
{
   public function index()
	{

		if(\Request::isMethod('post')){

			if(\Request::has('loc')){

				$loc = \Request::get('loc');
				$loc = explode(',', $loc);
				$lat = $loc[0];
				$lon = $loc[1];

			}

			$data = array(
				'lat' => $lat,
				'lon' => $lon,
			);

			return view('pages.mapa', $data);

		} else {

			return view('pages.mapa');

		}

	}
}
