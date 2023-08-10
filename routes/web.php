<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SalaoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EstruturaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('clientes', ClienteController::class);
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

    Route::get('/saloes/{salao}/estruturas', [SalaoController::class, 'showEstruturas'])->name('saloes.estruturas');
    Route::resource('saloes', SalaoController::class);
   

    Route::get('/reservas/grafico', [ReservaController::class, 'grafico'])->name('reservas.grafico');
    Route::resource('reservas',ReservaController::class);
    
    Route::get('/reservas/pdf/{id}', [ReservaController::class, 'generatePDF'])->name('reservas.pdf');
    
    Route::resource('estruturas', EstruturaController::class);

    



});