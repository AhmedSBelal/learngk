<?php

namespace App\Models;

use App\Traits\SetSlugAttribute;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StudyWork extends Model implements HasMedia, TranslatableContracts
{
    use InteractsWithMedia;
    use Translatable;
    use SetSlugAttribute;

    public const TYPE_SELECT = [
        'study' => 'Study In German',
        'work'  => 'Work in German',
    ];

    public $table = 'study_works';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'type',
        'created_at',
        'updated_at',
    ];

    protected $translatedAttributes = [
        'name',
        'short_description',
        'description',
        'seo_description',
        'seo_keywords',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
