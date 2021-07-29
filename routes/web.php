<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tutsmaker\CountryStateCityController;

use App\Http\Controllers\Administracao\PaisController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('template/templateadmin');
});

Route::get('/dashboard', function(){
    return view('pages/dashboard');
})->name('dashboard');

Route::get('/tables', function(){
    return view('pages/tables');
})->name('tables');


Route::get('/blank', function(){
    return view('pages/blank');
})->name('blank');

Route::get('/form', function(){
    return view('pages/form');
})->name('form');


Route::get('country-state-city',[CountryStateCityController::class, 'index'])->name('multiselect');
Route::post('get-states-by-country',[CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state',[CountryStateCityController::class, 'getCity']);


/*
Route::get('country-state-city',[CountryStateCityController::class, 'index']);
Route::post('get-states-by-country',[CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state',[CountryStateCityController::class, 'getCity']);
*/



Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('pais', PaisController::class);
});
