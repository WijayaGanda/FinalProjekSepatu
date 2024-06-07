<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SepatuController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes();

Route::resource('barangs', SepatuController::class);
Route::resource('homes', HomeController::class);
Route::resource('sales', PenjualanController::class);
Route::get('getShoes', [SepatuController::class, 'getData'])->name('barangs.getData');

//excel
Route::get('exportExcel', [SepatuController::class, 'exportExcel'])->name('barangs.exportExcel');
Route::get('exportPdf', [SepatuController::class, 'exportPdf'])->name('barangs.exportPdf');

Route::get('/exportNota/{id}', [PenjualanController::class, 'exportNota'])->name('sales.exportNota');
