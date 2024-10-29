<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['form_id', 'question_id', 'content'];

  /**
   * Get the form that owns the form.
   */
  public function form(): BelongsTo
  {
    return $this->belongsTo(Form::class);
  }

  /**
   * Get the question that owns the form.
   */
  public function question(): BelongsTo
  {
    return $this->belongsTo(Question::class);
  }
}
