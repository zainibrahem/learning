<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    use HasFactory;
    use CreatedBy;

    protected $fillable = [
        "name",
        "stage_id",
        "image",
        "created_by",
    ];



    public function creator(): HasOne
    {
        return $this->hasOne(User::class,'id');
    }

    public function stage(): HasOne
    {
        return $this->hasOne(Stage::class,'id','stage_id');
    }

    public function files():HasMany{
        return $this->hasMany(File::class,'subject_id','id');
    }


}
