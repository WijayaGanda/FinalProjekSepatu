<?php

use App\Http\Controllers\HomeController;
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
// klo dah kelar diganti lagi ke home
Route::get('/', function () {
    return view('barang.create');
});

Route::get('home',[HomeController::class, 'index'])->name('home');
