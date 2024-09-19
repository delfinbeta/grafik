<?php

namespace App\Http\Controllers;

use App\Http\Requests\Types\StoreTypeRequest;
use App\Http\Requests\Types\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $types = Type::all();

    return view('admin.types.index')->with('types', $types);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('admin.types.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreTypeRequest $request)
  {
    $data = $request->validated();

    $type = Type::create(['name' => $data['name']]);

    return redirect()->route('admin.types.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Type $type): View
  {
    return view('admin.types.show')->with('type', $type);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Type $type): View
  {
    return view('admin.types.edit')->with('type', $type);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTypeRequest $request, Type $type)
  {
    $data = $request->validated();

    $type->update(['name' => $data['name']]);

    return redirect()->route('admin.types.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Type $type)
  {
    $type->delete();

    return redirect()->route('admin.types.index');
  }
}
