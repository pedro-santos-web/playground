<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Validation;
use App\Http\Controllers\Map;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
	return view('welcome');
})->name('home');

Route::any('/map', [Map::class, 'index'])->name('map');

Route::any('/list-host', [Validation::class, 'index'])->name('list_host');
Route::any('/create-host', [Validation::class, 'create'])->name('create_host');
Route::post('/delete-host/{host_id}', [Validation::class, 'delete'])->name('delete_host');

Route::get('/ip', function (Request $request) {
	// $ip = {"162.159.138.85"};
	// $location_text = "The IP address {$ip->ipinfo->ip}.";
	// dd($location_text);
	// dd($request->ipinfo->all);
	$location_text = "The IP address is {$request->ipinfo->ip}.";
	// dd($location_text);
	return view('welcome', ['location' => $location_text]);
});