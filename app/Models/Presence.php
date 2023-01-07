<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    public function group()
   {
       return $this->belongsTo(Group::class, 'group_id');
   }
   public function course()
   {
       return $this->belongsTo(Course::class, 'course_id');
   }
   public function user()
   {
       return $this->belongsTo(User::class, 'user_id');
   }
}
