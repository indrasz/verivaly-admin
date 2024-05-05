<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\ResponseController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/recipient', [RecipientController::class, 'index'])->name('recipient');
Route::get('/proposal', [ProposalController::class, 'index'])->name('proposal');
Route::get('/proposal/{proposalId}', [ProposalController::class, 'detail'])->name('proposal.detail');
Route::get('/response', [ResponseController::class, 'index'])->name('response');
// Route::get('/response/{responseId}', [ResponseController::class, 'detail'])->name('proposal.detail');


Route::post('/convert', [DashboardController::class, 'convert'])->name('convert');
