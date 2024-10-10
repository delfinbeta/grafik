<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['question_id', 'title'];

  /**
   * Get the question that owns the option.
   */
  public function question(): BelongsTo
  {
    return $this->belongsTo(Question::class);
  }
}
