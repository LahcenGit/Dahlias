<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
    public function returninstructor(){
        $instructor = null;
        $instructor = Instructor::find($this->instructor_id);
        return $instructor;
    }
     
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
