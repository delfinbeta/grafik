<?php

use Illuminate\Support\Facades\Route;

use App\Models\Survey;

use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;

// Route::get('/surveys', [SurveyController::class, 'index'])->name('encuestas');
// Route::get('/surveys/create', [SurveyController::class, 'create'])->name('crear');
// Route::get('/surveys/{survey}/edit', [SurveyController::class, 'edit'])->name('editar');
// Route::get('/surveys/{id}', [SurveyController::class, 'show'])->name('detalle');
// Route::post('/insertar', [SurveyController::class, 'insertar'])->name('insertar');
// Route::put('/actualizar/{survey}', [SurveyController::class, 'actualizar'])->name('actualizar');
// Route::delete('/eliminar/{survey}', [SurveyController::class, 'eliminar'])->name('eliminar');

Route::resource('surveys', SurveyController::class);

Route::resource('surveys.questions', QuestionController::class)->shallow();

Route::get('/recuperar/{id}', function (int $id) {
  $survey = Survey::onlyTrashed()->where('id', $id)->first();
  $survey->restore();

  return 'Recuperado';
});