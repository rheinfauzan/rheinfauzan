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
//     return view('login/login');
// });


// controller login

Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Route::post('login-check', [App\Http\Controllers\LoginController::class, 'check_login']);

Route::get('register', [App\Http\Controllers\RegisterController::class, 'register'])->middleware('guest');

Route::post('register-store', [App\Http\Controllers\RegisterController::class, 'store']);

Route::get('signout', [App\Http\Controllers\LoginController::class, 'logout']);



Route::middleware(['auth'])->group(function () {
    // controller satu
    Route::get('/profile', [App\Http\Controllers\ControllerSatu::class, 'profile']);

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


    // Controller tiga
    Route::get('/mahasiswa', [App\Http\Controllers\ControllerTiga::class, 'mahasiswa'])->name('mahasiswa');

    Route::get('/get', [App\Http\Controllers\ControllerTiga::class, 'get']);

    Route::post('/store', [App\Http\Controllers\ControllerTiga::class, 'store']);

    Route::post('/delete', [App\Http\Controllers\ControllerTiga::class, 'delete']);

    // Controller Export
    Route::get('/export_excel', [App\Http\Controllers\ControllerExport::class, 'export_excel']);

    Route::get('/export_pdf', [App\Http\Controllers\ControllerExport::class, 'export_pdf']);
    });
