<?php

use Illuminate\Support\Facades\Route;

use App\Models\Survey;

use App\Http\Controllers\SurveyController;

Route::get('/surveys', [SurveyController::class, 'index'])->name('encuestas');
Route::get('/surveys/{id}', [SurveyController::class, 'show'])->name('detalle');