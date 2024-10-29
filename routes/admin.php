<?php

use Illuminate\Support\Facades\Route;

use App\Models\Survey;

use App\Http\Controllers\FormController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');

Route::get('/forms/excel', [FormController::class, 'excel'])->name('forms.excel');
Route::get('/forms/{form}', [FormController::class, 'show'])->name('forms.show');
Route::get('/forms', [FormController::class, 'index'])->name('forms.index');

Route::post('/surveys/{survey}/forms', [FormController::class, 'store'])->name('forms.store');
Route::get('/surveys/{survey}/forms/create', [FormController::class, 'create'])->name('forms.create');

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