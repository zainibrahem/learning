<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $fillable=['name','created_by'];
    public $timestamps=['created_at','updated_at'];



    public function creator(){
        return $this->hasOne(User::class,'id');
    }

}
