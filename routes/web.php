<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculesController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\PassagersController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController; 

Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 

Route::resource('vehicules', VehiculesController::class);
Route::resource('chauffeurs', ChauffeurController::class);
Route::resource('trajets', TrajetController::class);
Route::resource('passagers', PassagersController::class);
Route::resource('reservations', ReservationController::class);