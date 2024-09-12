<?php

namespace App\Http\Controllers;

use App\Http\Requests\Questions\StoreQuestionRequest;
use App\Http\Requests\Questions\UpdateQuestionRequest;
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
    // $questions = Question::where('survey_id', $survey->id)->get();

    // return view('admin.questions.index')->with('survey', $survey)->with('questions', $questions);
    return view('admin.questions.index')->with('survey', $survey);
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
  public function store(StoreQuestionRequest $request, Survey $survey)
  {
    $data = $request->validated();

    $question = Question::create([
      'survey_id' => $survey->id,
      'title' => $data['title'],
      'type' => $data['type']
    ]);

    return redirect()->route('admin.surveys.questions.index', $survey);
  }

  /**
   * Display the specified resource.
   */
  public function show(Question $question)
  {
    return view('admin.questions.show')->with('question', $question);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Question $question)
  {
    return view('admin.questions.edit')->with('question', $question);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateQuestionRequest $request, Question $question)
  {
    $data = $request->validated();

    $question->update([
      'title' => $data['title'],
      'type' => $data['type']
    ]);

    return redirect()->route('admin.surveys.questions.index', $question->survey_id);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Question $question)
  {
    $survey_id = $question->survey_id;

    $question->delete();

    return redirect()->route('admin.surveys.questions.index', $survey_id);
  }
}
