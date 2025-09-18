<?php

namespace App\Models;

use App\Traits\SetSlugAttribute;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia, TranslatableContracts
{
    use InteractsWithMedia;
    use Translatable;
    use SetSlugAttribute;

    public const TYPE = [
        'course' => 'Course',
        'test' => 'Test for germany language'
    ];
    public const COURSE_ATTEND_TYPE = [
        'online' => 'Online',
        'presence' => 'Presence'
    ];
    public $table = 'courses';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'exam_link',
        'course_attend_type',
        'course_book',
        'participant',
        'course_type_id',
        'course_level_id',
        'type',
        'price',
        'start_date',
        'end_date',
        'from',
        'to',
        'active',
        'created_at',
        'updated_at',
    ];

    protected $translatedAttributes = [
        'name',
        'short_description',
        'description',
        'duration',
        'months',
        'days',
        'seo_description',
        'seo_keywords',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function course_type()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id');
    }

    public function course_level()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
