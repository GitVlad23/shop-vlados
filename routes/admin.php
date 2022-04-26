<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PanelController;


Route::middleware('guest:admin')->group(function(){
	Route::get('/admin/login', [AuthController::class, 'login'])->name('admin_login');
	Route::post('/admin/login_process', [AuthController::class, 'login_process'])->name('admin_login_process');
});

Route::middleware('auth:admin')->group(function(){
	Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin_logout');
	Route::get('/admin/panel/index', [PanelController::class, 'index'])->name('panel_index');
});