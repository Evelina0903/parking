<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
Route::get('/edit/{idCar}/{idClient}/editCarClient', [CarController::class, 'editCarClient'])->whereNumber(['idCar','idClient']);


Route::get('/cars/{idCar}/{idClient}/deleteCarClient', [CarController::class, 'deleteCarClient'])->whereNumber(['idCar','idClient']);


Route::get('/parkingCarClient', [CarController::class, 'parkingCarClient']);

Route::put('/updateCarClient', [CarController::class, 'updateCarClient']);

Route::resource('/cars', CarController::class);








//oute::resource('/cars', [CarController::class, 'index']);
