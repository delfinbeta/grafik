<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Survey;
use Illuminate\Http\Request;
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
  public function store(Request $request)
  {
      //
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
