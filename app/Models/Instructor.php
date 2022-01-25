<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function age() {
        return $this->date_of_birth->diffInYears(\Carbon\Carbon::now());
         }
}
