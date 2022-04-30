<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DishesController;




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

Route::get('/',[App\Http\Controllers\OrderController::class,'index'])->name('order.form');
Route::post('/',[App\Http\Controllers\OrderController::class,'submit'])->name('order.submit');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('home');

Route::resource('/dish',DishesController::class);
Route::get('/order',[App\Http\Controllers\DishesController::class,'order'])->name('kitchen.order');
Route::get('/order/{order}/approve',[App\Http\Controllers\DishesController::class,'approve'])->name('kitchen.approve');
Route::get('/order/{order}/cancel',[App\Http\Controllers\DishesController::class,'cancel'])->name('kitchen.cancel');
Route::get('/order/{order}/ready',[App\Http\Controllers\DishesController::class,'ready'])->name('kitchen.ready');
Route::get('/order/{order}/serve',[App\Http\Controllers\OrderController::class,'serve'])->name('kitchen.serve');


