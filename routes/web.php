<?php

use App\Http\Controllers\BautizoController;
use App\Http\Controllers\ConfirmacioneController;
use App\Http\Controllers\MatrimonioController;
use App\Models\Confirmacione;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () { return view('index');})->middleware('auth');;
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('web');

Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('auth');
// Route::get('/bautizos/certificadoBautismo/{id}', [BautizoController::class, 'certificadoBautismo'])->name('certificadoBautismo');
Route::get('/bautizos/certificadoBautismo/{id}', [BautizoController::class, 'certificadoBautismo'])->name('bautizos.certificadoBautismo')->middleware('auth');
Route::get('/confirmaciones/certConfir/{id}', [ConfirmacioneController::class, 'certConfir'])->name('confirmaciones.certConfir')->middleware('auth');
Route::get('/matrimonios/certMat/{id}', [MatrimonioController::class, 'certMat'])->name('matrimonios.certMat')->middleware('auth');

// Route::get('bautizos/certificadoBautismo/{id}',[BautizoController::class,'certificadoBautismo']);
// Route::get('bautizos/certificadoBautismo', 'ControladorBautizo@metodoCertificadoBautismo')->name('bautizos.certificadoBautismo');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index')->middleware('auth');

Auth::routes(['register'=>false]);

route::resource('/padres',\App\Http\Controllers\PadreController::class)->middleware('auth');
route::resource('/madres',\App\Http\Controllers\MadreController::class)->middleware('auth');
route::resource('/documentos',\App\Http\Controllers\DocumentoController::class)->middleware('auth');
route::resource('/defunciones',\App\Http\Controllers\DefuncionController::class)->middleware('auth');
route::resource('/matrimonios',\App\Http\Controllers\MatrimonioController::class)->middleware('auth');
route::resource('/esposas',\App\Http\Controllers\EsposaController::class)->middleware('auth');
route::resource('/esposos',\App\Http\Controllers\EsposoController::class)->middleware('auth');
route::resource('/madrinas',\App\Http\Controllers\MadrinaController::class)->middleware('auth');
route::resource('/padrinos',\App\Http\Controllers\PadrinoController::class)->middleware('auth');
route::resource('/parrocos',\App\Http\Controllers\ParrocoController::class)->middleware('auth');
route::resource('/usuarios',\App\Http\Controllers\UserController::class)->middleware('can:usuarios');
route::resource('/confirmaciones',\App\Http\Controllers\ConfirmacioneController::class)->middleware('auth');
route::resource('/bautizos',\App\Http\Controllers\BautizoController::class)->middleware('auth');






