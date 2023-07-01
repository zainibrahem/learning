<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;
    use CreatedBy;

    protected $fillable = [
        'name',
        'path',
        'type',
        'image',
        'subject_id',
        'created_by',
    ];


    public function creator():HasOne{
        return $this->hasOne(User::class,'id','created_by');
    }

    public function subject():HasOne{
        return $this->hasOne(Subject::class,'id','subject_id');
    }
}
