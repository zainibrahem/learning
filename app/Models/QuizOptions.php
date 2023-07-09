<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuizOptions extends Model
{
    use HasFactory, CreatedBy;

    protected $table = "quiz_options";

    protected $fillable = [
        "question_id",
        "created_by",
        "name",
        "is_correct",
    ];

    public function quiz():HasOne{
        return $this->hasOne(Quiz::class,'id','quiz_id');
    }
}
