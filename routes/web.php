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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// klant dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home-create-abbonement', [App\Http\Controllers\HomeController::class, 'createAbbonment'])->name('createAbbonment');

// Pechmelding 
Route::get('/pechmelding', [App\Http\Controllers\pechMeldingController::class, 'index'])->name('pechmelding-form');
Route::post('/pechmelding-create', [App\Http\Controllers\pechMeldingController::class, 'createMelding'])->name('pechmelding-aanmaken');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
