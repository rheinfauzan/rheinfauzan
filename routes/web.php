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

// controller satu
Route::get('/', [App\Http\Controllers\ControllerSatu::class, 'index'])->name('profile');

Route::get('/tabel', [App\Http\Controllers\ControllerSatu::class, 'tabel'])->name('tabel');

Route::post('/tabel', [App\Http\Controllers\ControllerSatu::class, 'store']);

Route::get('/gettabel', [App\Http\Controllers\ControllerSatu::class, 'gettabel']);

Route::get('/show', [App\Http\Controllers\ControllerSatu::class, 'show']);

Route::post('/update', [App\Http\Controllers\ControllerSatu::class, 'update']);

Route::post('/delete', [App\Http\Controllers\ControllerSatu::class, 'delete']);

// controller dua
Route::get('/tabel2', [App\Http\Controllers\ControllerDua::class, 'tabel2'])->name('tabel2');

Route::get('/gettabel2', [App\Http\Controllers\ControllerDua::class, 'gettabel2']);

Route::post('/tabel2', [App\Http\Controllers\ControllerDua::class, 'store']);

Route::get('/getupdate', [App\Http\Controllers\ControllerDua::class, 'show']);

Route::post('/updateData', [App\Http\Controllers\ControllerDua::class, 'update']);

Route::post('/delete', [App\Http\Controllers\ControllerDua::class, 'delete']);

Route::get('/restored', [App\Http\Controllers\ControllerDua::class, 'restore']);

Route::post('/forcedelete', [App\Http\Controllers\ControllerDua::class, 'forcedelete']);