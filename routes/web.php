<?php

use App\Http\Controllers\Servicios2Controller;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home')->name('home');

// Rutas para Servicios2Controller
Route::resource('servicios', Servicios2Controller::class)
->names([
    'index' => 'servicios',
    'create' => 'servicios.create',
    'store' => 'servicios.store',
    'show' => 'servicios.show',
    'edit' => 'servicios.edit',
    'update' => 'servicios.update',
    'destroy' => 'servicios.destroy',
]);
//->middleware('auth');

// Rutas para ContactoController
Route::view('contacto', 'contacto')->name('contacto');
Route::post('contacto', [ContactoController::class, 'store']);
Route::get('categorias/{category}', 'App\Http\Controllers\CategoryController@show')->name('categories.show');

Auth::routes(['register'=>true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
