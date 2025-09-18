<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SetSlugAttribute
{
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
