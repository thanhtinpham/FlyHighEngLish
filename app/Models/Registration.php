<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'type',
        'notes',
        'details',
        'status',
    ];

    protected $casts = [
        'details' => 'array',
    ];

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'zalo_trial' => 'Đăng ký học thử qua Zalo',
            'vstep_exam' => 'Đăng ký thi thử B1 VSTEP',
            default => 'Đăng ký tư vấn',
        };
    }
}
