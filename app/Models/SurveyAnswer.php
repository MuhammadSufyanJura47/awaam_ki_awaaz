<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = ['response_id','answers'];

    protected $casts = [
        'answers' => 'array'
    ];
}