<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CourseType extends Model implements TranslatableContracts
{
    use Translatable;

    public $table = 'course_types';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'created_at',
        'updated_at',
    ];

    protected $translatedAttributes = [
        'name',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
