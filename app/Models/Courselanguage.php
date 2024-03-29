<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courselanguage extends Model
{
    use HasFactory;
  

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class ,'language_id');
    }
}
