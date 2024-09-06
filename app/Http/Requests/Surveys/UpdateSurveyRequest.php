<?php

namespace App\Http\Requests\Surveys;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSurveyRequest extends FormRequest
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
      'description' => 'nullable|string',
      'start' => 'required|date',
      'end' => 'required|date'
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
      'description.string' => 'La descripción debe ser una cadena de caracteres',
      'start.required' => 'La Fecha de inicio es obligatoria',
      'end.required' => 'La fecha fin es obligatoria'
    ];
  }
}
