<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'age_group','gender','education','occupation',
        'tech_usage','ai_usage','civic_participation'
    ];

    public function answers()
    {
        return $this->hasOne(SurveyAnswer::class);
    }

    public function getSelectedAnswersAttribute(): array
    {
        return $this->answers?->answers ?? [];
    }
}
