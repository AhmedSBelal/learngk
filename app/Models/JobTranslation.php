<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'job_translations';

    protected $fillable = [
        'name',
        'description',
        'locale',
        'job_id',
    ];
}
