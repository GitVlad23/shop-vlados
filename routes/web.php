<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;

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


Route::group(['prefix' => 'basket'], function() {
		Route::post('/add/{id}', [BasketController::class, 'basket_add'])->name('basket_add');
	Route::group(['middleware' => 'basket_is_not_empty'], function() {
		Route::get('/', [BasketController::class, 'basket'])->name('basket');
		Route::get('/place', [BasketController::class, 'basket_place'])->name('basket_place');
		Route::get('/place', [BasketController::class, 'basket_confirm'])->name('basket_confirm');
		Route::post('/remove/{id}', [BasketController::class, 'basket_remove'])->name('basket_remove');
	});
});




Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/{categoryID}', [MainController::class, 'category'])->name('category');


Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');

Route::post('/auth/login_process', [AuthController::class, 'login_process'])->name('login_process');
Route::post('/auth/register_process', [AuthController::class, 'register_process'])->name('register_process');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

