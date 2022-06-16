<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\PanelController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\MapController;

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

Route::any('/', [PanelController::class, 'index'])->name('panel');

Route::post('/add-host', [HostController::class, 'add'])->name('add_host');
Route::any('/edit-host/{id?}', [HostController::class, 'edit'])->name('edit_host');
Route::post('/delete-host/{id}', [HostController::class, 'delete'])->name('delete_host');


Route::post('/check-ip', [CheckController::class, 'ip'])->name('check_ip');
Route::post('/check-url', [CheckController::class, 'url'])->name('check_url');

Route::any('/map', [MapController::class, 'map'])->name('map');