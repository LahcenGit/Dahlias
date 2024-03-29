<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Image extends Model
{
    use HasFactory,SoftDeletes;
   
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
