<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerSalesController;
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

// Route::get('/', function(){
//     return view('auth.login');
// });
Route::get('/', [HomeController::class, 'index'])->name('pelanggan.homecustomer');
Auth::routes();

Route::get('/password/reset-direct', [ResetPasswordController::class, 'showForm'])->name('password.reset.direct');
Route::post('/password/reset-submit', [ResetPasswordController::class, 'reset'])->name('password.reset.direct.submit');

Route::middleware(['auth'])->group(function () {
    Route::resource('barangs', SepatuController::class);
    // Route::resource('homes', HomeController::class);
    Route::resource('sales', PenjualanController::class);
    Route::resource('customersales', CustomerSalesController::class);
    Route::resource('carts', CartController::class);
    Route::get('getShoes', [SepatuController::class, 'getData'])->name('barangs.getData');
    Route::delete('/customersales/{id}', [CustomerSalesController::class, 'destroy'])->name('customersales.destroy');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{shoe_id}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/cart/clear/{shoe_id}', [CartController::class, 'clearCart'])->name('cart.clear');

    //excel
    Route::get('exportExcel', [SepatuController::class, 'exportExcel'])->name('barangs.exportExcel');
    Route::get('exportPdf', [SepatuController::class, 'exportPdf'])->name('barangs.exportPdf');

    Route::get('/exportNotaPenjualan/{id}', [PenjualanController::class, 'exportNotaPenjualan'])->name('sales.exportNotaPenjualan');

    Route::get('/exportNota/{id}', [CustomerSalesController::class, 'exportNota'])->name('customersales.exportNota');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('home');
});
Route::middleware(['auth', 'role:customer'])->group(function () {
    // Customer Specific Routes
    // Example: Customer-specific routes
    Route::get('/customer', [HomeController::class, 'index'])->name('pelanggan.homecustomer');
    // Route::resource('sales', PenjualanController::class);
    Route::resource('customersales', CustomerSalesController::class);
});
