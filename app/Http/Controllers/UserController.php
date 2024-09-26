<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $users = User::paginate();

    return view('admin.users.index')->with('users', $users);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    $types = Type::all();

    return view('admin.users.create')->with('types', $types);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    $data = $request->validated();

    $user = User::create([
      'firstname' => $data['firstname'],
      'lastname' => $data['lastname'],
      'phone' => $data['phone'],
      'address' => $data['address'],
      'type_id' => $data['type_id'],
      'role_id' => $data['role_id'],
      'email' => $data['email'],
      'password' => Hash::make($data['password'])
    ]);

    return redirect()->route('admin.users.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('admin.users.show')->with('user', $user);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $types = Type::all();

    return view('admin.users.edit')->with('user', $user)->with('types', $types);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    $data = $request->validated();

    $user->update([
      'firstname' => $data['firstname'],
      'lastname' => $data['lastname'],
      'phone' => $data['phone'],
      'address' => $data['address'],
      'type_id' => $data['type_id'],
      'role_id' => $data['role_id'],
      'email' => $data['email']
    ]);

    return redirect()->route('admin.users.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $user->delete();

    return redirect()->route('admin.users.index');
  }
}
