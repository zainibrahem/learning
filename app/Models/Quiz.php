<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\hasOne;


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


    public function subject(): hasOne
    {
        return $this->hasOne(Subject::class, 'id','subject_id');
    }

    public function creator(): hasOne
    {
        return $this->hasOne(User::class, 'id','created_by');
    }
}
