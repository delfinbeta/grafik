<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['survey_id', 'type', 'title'];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array<int, string>
   */
  protected $appends = ['type_name'];

  /**
   * Get the question's Type Name.
   */
  protected function typeName(): Attribute
  {
      return Attribute::make(
          get: function (mixed $value, array $attributes) {
              switch ($attributes['type']) {
                  case 1: return 'Texto Corto'; break;
                  case 2: return 'Texto Largo'; break;
                  case 3: return 'Opción Simple'; break;
                  case 4: return 'Opción Multiple'; break;
                  case 5: return 'Fecha'; break;
                  default: return '----'; break;
              }
          }
      );
  }

  /**
   * Get the survey that owns the question.
   */
  public function survey(): BelongsTo
  {
    return $this->belongsTo(Survey::class);
  }

  /**
   * Get the options for the question.
   */
  public function options(): HasMany
  {
    return $this->hasMany(Option::class);
  }
}
