<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');
Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');
Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');

Route::get('/dashboardchart', [DashboardController::class, 'index']);
Route::get('/Pesanan', [PesananController::class, 'index'])->name('Pesanan.index');

Route::resource('pesanan', PesananController::class);
Route::resource('customers', CustomerController::class);
Route::resource('services', ServiceController::class);