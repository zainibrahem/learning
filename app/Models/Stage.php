<?php

namespace App\Models;

use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stage extends Model
{
    use HasFactory, CreatedBy;
    protected $fillable=['name','created_by'];
    public $timestamps=['created_at','updated_at'];



    public function creator():HasOne
    {
        return $this->hasOne(User::class,'id','created_by');
    }


    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class,'stage_id');
    }

}
