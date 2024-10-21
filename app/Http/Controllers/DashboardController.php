<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $user = Auth::user();

    return view('dashboard')->with('user', $user);
  }
}
