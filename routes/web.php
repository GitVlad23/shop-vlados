<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/{categoryID}', [MainController::class, 'category'])->name('category');


Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');

Route::post('/auth/login_process', [AuthController::class, 'login_process'])->name('login_process');
Route::post('/auth/register_process', [AuthController::class, 'register_process'])->name('register_process');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');