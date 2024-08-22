<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SurveyController extends Controller
{
  /**
   * Survey list.
   */
  public function index(): View
  {
    $surveys = Survey::all();

    return view('admin.surveys.index')->with('surveys', $surveys);
  }

  /**
   * Show the survey for a given id.
   */
  public function show(int $id): View
  {
    $survey = Survey::findOrFail($id);

    return view('admin.surveys.show')->with('survey', $survey);
  }
}
