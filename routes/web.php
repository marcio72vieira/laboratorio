<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tutsmaker\CountryStateCityController;
use App\Http\Controllers\Administracao\PaisController;
use App\Http\Controllers\Administracao\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Administracao\AssociadoController;

// CONTROLLERS CATADORES
use App\Http\Controllers\Catadores\MunicipioController;


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

Route::get('/formfront', function () {
    return view('formfront');
});

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


Route::get('/login', function(){
    return view('login');
})->name('login');


Route::get('country-state-city',[CountryStateCityController::class, 'index'])->name('multiselect');
Route::post('get-states-by-country',[CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state',[CountryStateCityController::class, 'getCity']);


Route::get('images', [ ImageController::class, 'index' ]);
Route::post('images', [ ImageController::class, 'store' ])->name('images.store');




/*
Route::get('country-state-city',[CountryStateCityController::class, 'index']);
Route::post('get-states-by-country',[CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state',[CountryStateCityController::class, 'getCity']);
*/



Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('pais', PaisController::class);
    Route::resource('posts', PostController::class);

    // ROTAS DO PROJETO CATADORES
    //Route::resource('municipio', MunicipioController::class);
});


// ROTAS DO PROJETO CATADORES
Route::prefix('admincat')->name('admincat.')->group(function() {

    Route::resource('municipio', MunicipioController::class);
});
Route::get('admincat/getMunicipios',[MunicipioController::class,'getMunicipios'])->name('admincat.getMunicipios');




/*
Route::get('/associados', function(){
    return view('pages/associados');
})->name('associados');
*/


Route::get('/associados',[AssociadoController::class,'index'])->name('associados');
Route::get('/getAssociados',[AssociadoController::class,'getAssociados'])->name('getAssociados');

route::get('/associadoshow/{id}',[AssociadoController::class,'associadoshow'])->name('associado.atual.show');
route::get('/associadoeditar/{id}',[AssociadoController::class,'associadoeditar'])->name('associado.atual.editar');
route::delete('/associadodeletar/{id}',[AssociadoController::class,'associadodeletar'])->name('associado.atual.deletar');
