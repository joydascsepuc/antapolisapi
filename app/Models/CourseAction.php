<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAction extends Model
{
    use HasFactory;

    protected $table = 'course_info';
    // protected $fillable = ['student_id','course_id'];
}