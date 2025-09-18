<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'setting_translations';

    protected $fillable = [
        'text',
        'short_description',
        'long_description',
        'locale',
        'setting_id',
    ];
}
