<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finalregistration extends Model
{
    use HasFactory;
    public function returnStudent(){
        $student = null;
        $student = User::where('id',$this->user_id)->first();
        return $student;
    }
    public function returnEdition(){
        $edition = null;
        $edition = Group::where('id',$this->group_id)->first();
        return $edition;
    }

    public function returnCourse(){
        $course = null;
        $edition = Group::where('id',$this->group_id)->first();
        $course = Course::where('id',$edition->course_id)->first();
        return $course;
    }

    public function group()
    {
        return $this->belongsTo(Group::class ,'group_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class ,'course_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment(){
        $payment = Payment::where('user_id',$this->user_id)->where('group_id',$this->group_id)->sum('amount');
        return $payment;
    }

   
}
