<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
  use HasFactory;
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['type_id', 'title', 'description', 'start', 'end', 'image'];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
      return [
        'start' => 'datetime',
        'end' => 'datetime',
      ];
  }

  /**
   * Get the questions for the survey.
   */
  public function questions(): HasMany
  {
    return $this->hasMany(Question::class);
  }

  /**
   * Get the type that owns the post.
   */
  public function type(): BelongsTo
  {
    return $this->belongsTo(Type::class);
  }

  /**
   * The users that belong to the survey.
   */
  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class);
  }
}
