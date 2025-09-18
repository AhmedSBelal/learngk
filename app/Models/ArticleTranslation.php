<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'article_translations';

    protected $fillable = [
        'title',
        'locale',
        'description',
        'article',
        'seo_description',
        'seo_keywords',
        'article_id'
    ];
}
