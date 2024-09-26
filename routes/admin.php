<?php

use Illuminate\Support\Facades\Route;

use App\Models\Survey;

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

Route::get('/surveys/clone/{survey}', [SurveyController::class, 'clone'])->name('surveys.clone');

Route::resources([
  'types' => TypeController::class,
  'users' => UserController::class,
  'surveys' => SurveyController::class
]);

Route::resource('surveys.questions', QuestionController::class)->shallow();

Route::get('/recuperar/{id}', function (int $id) {
  $survey = Survey::onlyTrashed()->where('id', $id)->first();
  $survey->restore();

  return 'Recuperado';
});