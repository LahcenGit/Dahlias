<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courseinstructor extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class ,'instructor_id');
    }
    public function returninstructor(){
        $instructor = null;
        $instructor = Instructor::where('id',$this->instructor_id)->first();
      
        return $instructor->name;
    }
}
