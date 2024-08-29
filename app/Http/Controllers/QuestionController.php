<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Survey $survey): View
  {
    $questions = Question::where('survey_id', $survey->id)->get();

    return view('admin.questions.index')->with('survey', $survey)->with('questions', $questions);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Survey $survey)
  {
    return view('admin.questions.create')->with('survey', $survey);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   */
  public function show(Question $question)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Question $question)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Question $question)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Question $question)
  {
      //
  }
}
