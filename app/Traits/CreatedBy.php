<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CreatedBy
{
    public static function bootCreatedBy()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::id(); // Set the createdBy value to the authenticated user's ID or any specific value you desire
        });
    }
}
