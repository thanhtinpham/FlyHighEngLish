<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Facades\Cache;

class Lesson extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('home_preview_lessons'));
        static::deleted(fn () => Cache::forget('home_preview_lessons'));
    }

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'level_or_week',
        'description',
        'html_content',
        'html_file_path',
        'is_preview',
        'order',
    ];

    protected $casts = [
        'is_preview' => 'boolean',
        'order' => 'integer',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function progresses(): HasMany
    {
        return $this->hasMany(LessonProgress::class);
    }

    public function progressForUser(?User $user): ?LessonProgress
    {
        if (!$user) return null;
        return $this->progresses()->where('user_id', $user->id)->first();
    }
}
