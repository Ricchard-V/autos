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

//Ruta landing page
Route::get('/', function () {
    return view('landingpage');
})->name('landing');

// Ruta administrador del sitio
Route::resource('/ciautos',App\Http\Controllers\adminController::class)->names('admin');

//rutas login...
Auth::routes();



