<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('profile');
// });

Route::get('/', [App\Http\Controllers\ControllerSatu::class, 'index'])->name('profile');

Route::get('/tabel', [App\Http\Controllers\ControllerSatu::class, 'tabel'])->name('tabel');

Route::post('/tabel', [App\Http\Controllers\ControllerSatu::class, 'store']);

Route::get('/gettabel', [App\Http\Controllers\ControllerSatu::class, 'gettabel']);

Route::get('/show', [App\Http\Controllers\ControllerSatu::class, 'show']);

Route::post('/update', [App\Http\Controllers\ControllerSatu::class, 'update']);

Route::post('/delete', [App\Http\Controllers\ControllerSatu::class, 'delete']);

