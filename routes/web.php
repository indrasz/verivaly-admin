<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecipientController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/recipient', [RecipientController::class, 'index'])->name('recipient');

Route::post('/convert', [DashboardController::class, 'convert'])->name('convert');
