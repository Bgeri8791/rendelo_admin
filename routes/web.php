<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\StatisticsController;

Route::get('/', fn() => redirect()->route('patients.index'));

Route::resource('patients', PatientsController::class);

Route::get('visits', [VisitsController::class, 'index'])->name('visits.index');

Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics.index');

Route::patch('/patients/{patient}/status', [PatientsController::class, 'updateStatus'])->name('patients.status');
