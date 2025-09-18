<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Faq extends Model implements HasMedia, TranslatableContracts
{
    use InteractsWithMedia;
    use Translatable;

    public $table = 'faqs';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
    ];

    protected $translatedAttributes = [
        'question',
        'answer',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
