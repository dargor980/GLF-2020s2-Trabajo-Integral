<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\leerArchivo;
use App\Http\Controllers\getDataController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/sendtxt', [leerArchivo::class, 'readText']);

Route::get('/puntosventa',[getDataController::class, 'getPuntosVenta']);

Route::get('/centrosdistribucion', [getDataController::class, 'getCentrosDistribucion']);

Route::get('/addlog', [getDataController::class, 'addLogs']);

Route::get('/log', function() {
    return view('log');
});

Route::get('/diag', function() {
    return view('diag');
});
Route::get('/clearlog', function() {
    file_put_contents(base_path().'/storage/logs/laravel.log', " ");
});
Route::get('/printlog', function() {
    return file_get_contents(base_path().'/storage/logs/laravel.log');
});
