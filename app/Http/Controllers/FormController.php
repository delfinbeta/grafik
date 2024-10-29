<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FormController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $surveys = Survey::all();

    return view('admin.forms.index')->with('surveys', $surveys);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Survey $survey)
  {
    return view('admin.forms.create')->with('survey', $survey);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Survey $survey)
  {
    $user_id = Auth::user()->id;

    $form = Form::create([
      'user_id' => $user_id,
      'survey_id' => $survey->id,
      'person' => $request->person
    ]);

    foreach ($request->answers as $key => $value) {
      $content = $value;
      $question = Question::find($key);

      if ($question && ($question->type == 4)) {
        $content = '';
        foreach ($value as $item) {
          $content .= $item.'-';
        }
        $content = substr($content, 0, -1);
      }

      $form->answers()->create([
        'question_id' => $question->id,
        'content' => $content
      ]);
    }

    return redirect()->route('dashboard');
  }

  /**
   * Display the specified resource.
   */
  public function show(Form $form)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Form $form)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Form $form)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Form $form)
  {
      //
  }
}
