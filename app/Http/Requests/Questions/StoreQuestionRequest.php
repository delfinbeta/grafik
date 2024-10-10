<?php

namespace App\Http\Requests\Questions;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
      'title' => 'required|string',
      'type' => 'required|in:1,2,3,4,5',
      'options' => 'nullable|array'
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   */
  public function messages(): array
  {
    return [
      'title.required' => 'El título es obligatorio',
      'title.string' => 'El título debe ser una cadena de caracteres',
      'type.required' => 'El Tipo es obligatorio',
      'type.in' => 'El Tipo tiene un valor incorrecto'
    ];
  }
}
