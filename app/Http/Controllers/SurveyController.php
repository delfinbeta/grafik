<?php

namespace App\Http\Controllers;

use App\Http\Requests\Surveys\StoreSurveyRequest;
use App\Http\Requests\Surveys\UpdateSurveyRequest;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class SurveyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $surveys = Survey::all();

    return view('admin.surveys.index')->with('surveys', $surveys);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('admin.surveys.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreSurveyRequest $request)
  {
    // $survey = new Survey;

    // $survey->title = 'Titulo de la Encuesta';
    // $survey->start = '2024-09-08';
    // $survey->end = '2024-09-20';

    // $survey->save();
    // $data = $request->validate([
    //   'title' => 'required|string',
    //   'description' => 'nullable|string',
    //   'start' => 'required|date',
    //   'end' => 'required|date'
    // ]);

    $data = $request->validated();

    if($request->hasFile('image')) {
      $fileImage = $request->file('image');
      $path = $fileImage->path();
      $extension = $fileImage->extension();
      $imageName = $fileImage->getClientOriginalName();

      Storage::putFileAs('surveys', $fileImage, $imageName);
    } else {
      $imageName = null;
    }

    $survey = Survey::create([
      'title' => $data['title'],
      'description' => $data['description'],
      'start' => $data['start'],
      'end' => $data['end'],
      'image' => $imageName
    ]);

    return redirect()->route('admin.surveys.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Survey $survey): View
  {
    // $survey = Survey::findOrFail($id);

    return view('admin.surveys.show')->with('survey', $survey);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Survey $survey): View
  {
    return view('admin.surveys.edit')->with('survey', $survey);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateSurveyRequest $request, Survey $survey)
  {
    // $survey = Survey::find($id);

    // $survey->title = 'Encuesta Modificada';

    // $survey->save();

    // $data = $request->validate([
    //   'title' => 'required|string',
    //   'description' => 'nullable|string',
    //   'start' => 'required|date',
    //   'end' => 'required|date'
    // ]);

    $data = $request->validated();

    $survey->update([
      'title' => $data['title'],
      'description' => $data['description'],
      'start' => $data['start'],
      'end' => $data['end']
    ]);

    return redirect()->route('admin.surveys.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Survey $survey)
  {
    // $survey = Survey::find($id);
    $survey->delete();

    return redirect()->route('admin.surveys.index');
  }
}
