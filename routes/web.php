<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Validation;
use App\Http\Controllers\Map;
use Illuminate\Http\Request;

use App\Http\Controllers\PanelController;
use App\Http\Controllers\HostController;

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

// Route::get('/', function() {
// 	return view('welcome');
// })->name('home');

Route::any('/map', [Map::class, 'index'])->name('map');
Route::any('/home', [Map::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| New
|--------------------------------------------------------------------------
*/
// Route::any('/', function() {
// 	return view('main');
// })->name('panel');

Route::any('/', [PanelController::class, 'index'])->name('panel');

Route::post('/add-host', [HostController::class, 'add'])->name('add_host');
Route::post('/delete-host/{host_id}', [HostController::class, 'delete'])->name('delete_host');
Route::get('/edit-host', [HostController::class, 'edit'])->name('edit_host');
// Route::post('/update-host/{host_id}', [HostController::class, 'update'])->name('update_host');

/*
|--------------------------------------------------------------------------
| Hosts
|--------------------------------------------------------------------------
*/
Route::any('/list-host', [Validation::class, 'index'])->name('list_host');
Route::any('/create-host', [Validation::class, 'create'])->name('create_host');
// Route::post('/delete-host/{host_id}', [Validation::class, 'delete'])->name('delete_host');
// Route::get('/edit-host/{host_id}', [Validation::class, 'edit'])->name('edit_host');
// Route::post('/update-host/{host_id}', [Validation::class, 'update'])->name('update_host');