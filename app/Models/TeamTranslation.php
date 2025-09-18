<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'team_translations';

    protected $fillable = [
        'name',
        'locale',
        'description',
        'team_id',
    ];
}
