<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTypeTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'course_type_translations';

    protected $fillable = [
        'name',
        'locale',
        'course_type_id'
    ];
}
