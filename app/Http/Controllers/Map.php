<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Map extends Controller
{
   public function index()
	{
		return view('pages.mapa');
	}
}
