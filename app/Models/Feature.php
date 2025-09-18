<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Feature extends Model implements HasMedia, TranslatableContracts
{
    use InteractsWithMedia;
    use Translatable;

    protected $table = 'features';

    protected $appends = [
        'image'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'created_at',
        'updated_at'
    ];

    protected $translatedAttributes = [
        'title',
        'description'
    ];

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url = $file->getUrl();
        }
        return $file;
    }

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
