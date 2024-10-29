<?php

namespace App\Exports;

use App\Models\Answer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnswerExport implements FromQuery, WithMapping, WithHeadings
{
  use Exportable;

  public function query()
  {
    return Answer::query()->with('form', 'form.survey', 'form.user', 'question');
  }

  public function map($answer): array
  {
    if (($answer->question->type == 1) || ($answer->question->type == 2) || ($answer->question->type == 5)) {
      $content = $answer->content;
    }

    if ($answer->question->type == 3) {
      $option = $answer->question->options()->where('id', $answer->content)->first();
      $content = $option->title;
    }

    if ($answer->question->type == 4) {
      $ids = explode('-', $answer->content);
      $options = $answer->question->options()->whereIn('id', $ids)->get();
      $content = '';

      foreach ($options as $item) {
        $content .= $item->title.' | ';
      }
    }


    return [
      $answer->id,
      $answer->form->survey->title,
      $answer->form->user->firstname,
      $answer->form->person,
      $answer->question->title,
      $content
    ];
  }

  public function headings(): array
  {
    return [
      'ID',
      'Encuesta',
      'Encuestador',
      'Persona',
      'Pregunta',
      'Respuesta'
    ];
  }
}
