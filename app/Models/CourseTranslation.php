<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'course_translations';

    protected $fillable = [
        'name',
        'locale',
        'short_description',
        'description',
        'duration',
        'months',
        'days',
        'seo_description',
        'seo_keywords',
        'course_id',
    ];
}
