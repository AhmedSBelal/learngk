<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyWorkTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'study_work_translations';

    protected $fillable = [
        'name',
        'local',
        'short_description',
        'description',
        'study_work_id',
        'seo_description',
        'seo_keywords',
    ];
}
