<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Quiz extends Model
{
    use HasFactory, CreatedBy;

    protected $table = "quizs";

    protected $fillable = [
        "name",
        "created_by",
        'subject_id'
    ];

    public function questions(): belongsToMany
    {
        return $this->belongsToMany(QuizQuestions::class, 'quiz_question','quiz_id','question_id');
    }
}
