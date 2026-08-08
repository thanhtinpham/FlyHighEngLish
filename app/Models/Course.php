<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'objectives',
        'roadmap',
        'structure',
        'level',
        'thumbnail',
        'price',
        'is_published',
    ];

    protected $casts = [
        'objectives' => 'array',
        'roadmap' => 'array',
        'structure' => 'array',
        'is_published' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('order', 'asc');
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'enrollments')->withPivot('status', 'enrolled_at')->withTimestamps();
    }

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'giao-tiep' => 'Tiếng Anh Giao Tiếp',
            'ielts' => 'Luyện Thi IELTS',
            'toeic' => 'Luyện Thi TOEIC',
            'tre-em' => 'Tiếng Anh Cho Trẻ Em',
            default => 'Khóa Học Tiếng Anh',
        };
    }
}
