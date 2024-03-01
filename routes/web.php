<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\EquationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prom',[QualificationController::class,'create']); 
Route::post('/prom',[QualificationController::class,'store'])->name('for.store');

Route::get('/ec',[EquationController::class,'create']); 
Route::post('/ec',[EquationController::class,'store'])->name('for.store');