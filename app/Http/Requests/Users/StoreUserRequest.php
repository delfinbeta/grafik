<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'firstname' => 'required|string',
      'lastname' => 'required|string',
      'phone' => 'nullable|string',
      'address' => 'nullable|string',
      'type_id' => 'nullable|exists:types,id',
      'role_id' => 'required|in:1,2,3',
      'email' => 'required|email',
      'password' => 'required|confirmed|min:8'
    ];
  }
}
