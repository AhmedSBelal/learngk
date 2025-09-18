<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'faq_translations';

    protected $fillable = [
        'question',
        'locale',
        'answer',
        'faq_id',
    ];
}
