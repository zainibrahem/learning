<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuizQuestions extends Model
{
    use HasFactory, CreatedBy;

    protected $table = "quiz_quistions";

    protected $fillable = [
        "subject_id",
        "name",
        "type",
        "created_by"
    ];

    public function creator():HasOne{
        return $this->hasOne(User::class,'id','created_by');
    }
    public function subject():HasOne{
        return $this->hasOne(Subject::class,'id','subject_id');
    }

    public function options():HasMany{
        return $this->hasMany(QuizOptions::class,'question_id','id');
    }

    public function quiz():BelongsToMany{
        return $this->belongsToMany(Quiz::class,'quiz_question','question_id','question_id');
    }
}
