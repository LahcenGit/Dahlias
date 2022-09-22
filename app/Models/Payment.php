<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function student()
   {
       return $this->belongsTo(User::class, 'user_id');
   }

   public function group()
   {
       return $this->belongsTo(Group::class, 'group_id');
   }

   public function returnCourse(){
    $course = null;
    $group = Group::where('id',$this->group_id)->first();
    $course = Course::where('id',$group->course_id)->first();
    return $course;
   }
}
