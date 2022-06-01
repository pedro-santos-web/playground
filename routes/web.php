<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Validation;
use App\Http\Controllers\Map;

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

Route::get('/map', [Map::class, 'index'])->name('map');

Route::any('/list-host', [Validation::class, 'index'])->name('list_host');
Route::any('/create-host', [Validation::class, 'create'])->name('create_host');