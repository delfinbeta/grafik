<?php

namespace App\Http\Controllers;

use App\Http\Requests\Surveys\StoreSurveyRequest;
use App\Http\Requests\Surveys\UpdateSurveyRequest;
use App\Models\Survey;
use App\Models\Type;
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
    $types = Type::all();

    return view('admin.surveys.create')->with('types', $types);
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
      'type_id' => $data['type_id'],
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
    $types = Type::all();

    return view('admin.surveys.edit')->with('survey', $survey)->with('types', $types);
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
      'type_id' => $data['type_id'],
      'title' => $data['title'],
      'description' => $data['description'],
      'start' => $data['start'],
      'end' => $data['end']
    ]);

    return redirect()->route('admin.surveys.index');
  }

  /**
   * Clone
   */
  public function clone(Survey $survey)
  {
    $survey2 = Survey::create([
      'type_id' => $survey->type_id,
      'title' => $survey->title,
      'description' => $survey->description,
      'start' => $survey->start,
      'end' => $survey->end,
      'image' => $survey->image
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
