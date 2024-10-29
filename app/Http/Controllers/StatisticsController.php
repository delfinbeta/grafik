<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Type;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
  public function index()
  {
    $types = Type::withCount('surveys')->get();
    $surveys = Survey::withCount('forms')->get();

    return view('admin.statistics.index')->with('types', $types)->with('surveys', $surveys);
  }
}
